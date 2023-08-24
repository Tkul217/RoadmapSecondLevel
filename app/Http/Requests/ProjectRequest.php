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
            'image' => ['nullable', 'image', 'mimes:jpeg, png, jpg', 'max:2048'],
            'deadline' => ['required', 'date'],
        ];
    }

    public function authorize(): bool
    {
        return auth()->user()?->hasRole('admin');
    }

    public function messages()
    {
        return [
            'user_id' => 'User is required',
            'client_id' => 'Client is required',
            'status' => 'Status is required',
            'title' => 'Title is required',
            'description' => 'Description is required',
            'image' => 'Send image again, please',
            'image.image' => 'File must be image',
            'image.mimes' => 'Image format must be jpeg, jpg or png',
            'image.max' => 'Max image size is 2048mb'
        ];
    }
}
