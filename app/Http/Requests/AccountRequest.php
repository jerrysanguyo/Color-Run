<?php

namespace App\Http\Requests;

use App\Models\User;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class AccountRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        $isUpdate = User::where('email', $this->input('email'))
                        ->where('contact_number', $this->input('contact'))
                        ->exists();

        return [
            'name'     => 'required|string|max:255',
            'email'    => [
                'required',
                'email',
                Rule::unique('users', 'email')->ignore($this->input('email'), 'email'),
            ],
            'contact'  => [
                'required',
                'string',
                Rule::unique('users', 'contact_number')->ignore($this->input('contact'), 'contact_number'),
            ],
            'password' => $isUpdate ? 'nullable|string|min:6' : 'required|string|min:6',
            'role'     => 'required|exists:roles,name',
        ];
    }
}
