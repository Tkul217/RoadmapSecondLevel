<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'name' => ['required'],
            'email' => ['required', 'email', 'max:254'],
            'password' => ['required'],
            'remember_token' => ['nullable'],
            'deleted_at' => ['nullable', 'date'],
        ];
    }

    public function authorize(): bool
    {
        return auth()->user()->hasRole('admin');
    }
}
