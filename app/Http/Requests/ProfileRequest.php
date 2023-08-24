<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProfileRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'name' => ['required', 'string'],
            'email' => ['required', 'email']
        ];
    }

    public function authorize(): bool
    {
        return true;
    }

    public function messages()
    {
        return [
            'name.required' => 'Name is required',
            'name.string' => 'Name must be string',
            'email.required' => 'Email is required',
            'email.email' => 'Email must me email'
        ];
    }
}
