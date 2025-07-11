<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class GenerateQrRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }
    
    public function rules(): array
    {
        return [
            'email' => 'required|email|exists:participants,email',
        ];
    }

    public function messages(): array
    {
        return [
            'email.exists' => 'You are not yet registered.',
        ];
    }
}
