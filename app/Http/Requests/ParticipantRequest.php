<?php

namespace App\Http\Requests;

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
            'name'          => 'required|string|max:255',
            'age'           => 'required|integer|min:0|max:120',
            'sex'           => 'required|string|in:Male,Female,Prefer not to say',
            'email'         => 'required|email|unique:participants,email',
            'phone'         => 'required|string|unique:participants,phone|max:11',
            'shirt_size'    => 'required|in:XS,S,M,L,XL,XXL',
        ];
    }
}
