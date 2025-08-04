<?php

namespace App\Http\Requests;

use App\Models\Companion;
use App\Models\Participant;
use App\Models\Slot;
use Illuminate\Foundation\Http\FormRequest;

class ParticipantRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'name'                  => 'required|string|max:255',
            'age'                   => 'required|integer|min:0|max:120',
            'sex'                   => 'required|string|in:Male,Female,Prefer not to say',
            'email'                 => 'required|email|unique:participants,email',
            'phone'                 => 'required|string|unique:participants,phone|max:11',
            'shirt_size'            => 'required|in:XS,S,M,L,XL,XXL,XXXL',
            'kilometer'             => 'required|in:1km,2km',
            'agree1'                => 'accepted',
            'agree2'                => 'accepted',
            'agree3'                => 'accepted',
            'participant_type'      => 'required|in:PWD,Advocate',
            'has_companion'         => 'nullable|boolean',
            'companion_name'        => 'required_if:has_companion,1|nullable|string|max:255',
            'companion_tshirt_size'  => 'required_if:has_companion,1|nullable|in:XS,S,M,L,XL,XXL,XXXL',
            'organization'          => 'nullable|string|max:255',
        ];
    }

    public function withValidator($validator): void
    {
        $validator->after(function ($validator) {
            $participantCount = Participant::count();
            $companionCount = Companion::count();
            $total = $participantCount + $companionCount;
            
            $newEntries = 1;
            
            if (
                $this->input('participant_type') === 'PWD' &&
                $this->filled('companion_name')
            ) {
                $newEntries += 1;
            }

            $slot = Slot::find(1);
            if ($slot && ($total + $newEntries > $slot->slot)) {
                $validator->errors()->add('name', 'Registration is closed. Maximum number of participants reached.');
            }
        });
    }

    public function messages(): array
    {
        return [
            'agree1.accepted'         => 'Kailangan mong sang-ayunan ang Reminder Compliance.',
            'agree2.accepted'         => 'Kailangan mong sang-ayunan ang PAGPAPAHINTULOT.',
            'agree3.accepted'         => 'Kailangan mong sang-ayunan ang Privacy Notice.',
            'participant_type.in'     => 'Invalid participant type selected.',
            'companion_name.required_if' => 'Please provide your companion\'s name.',
            'companion_shirt_size.required_if' => 'Please select your companion\'s T-shirt size.',
        ];
    }
}