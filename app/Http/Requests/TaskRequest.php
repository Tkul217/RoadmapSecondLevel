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
            'files' => ['nullable'],
            'files.*' => ['file', 'max:2048']
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
            'project_id' => 'Project is required',
            'title' => 'Tit;e is required',
            'description' => 'Description is required',
            'status' => 'Status is required',
            'files' => 'Something is wrong..Please send files again',
            'files.*.max' => 'Max filesize is 2048mb'
        ];
    }
}
