<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProjectRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'user_id' => ['required', 'integer'],
            'client_id' => ['required', 'integer'],
            'status' => ['required', 'string'],
            'title' => ['required'],
            'description' => ['required'],
            'image' => ['nullable', 'image', 'mimes:jpeg, png, jpg'],
            'deadline' => ['required', 'date'],
        ];
    }

    public function authorize(): bool
    {
        return auth()->user()?->hasRole('admin');
    }
}
