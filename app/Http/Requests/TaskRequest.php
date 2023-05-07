<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class TaskRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'user_id' => ['required', 'integer'],
            'project_id' => ['required', 'integer'],
            'title' => ['required'],
            'description' => ['required'],
            'status' => ['required', 'string'],
            'files' => ['nullable', 'file']
        ];
    }

    public function authorize(): bool
    {
        return auth()->user()->hasRole('admin');
    }
}
