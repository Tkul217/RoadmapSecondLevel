<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ClientRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'company' => ['required'],
            'VAT' => ['required', 'integer'],
            'address' => ['required'],
        ];
    }

    public function authorize(): bool
    {
        return auth()->user()->hasRole('admin');
    }

    public function messages()
    {
        return [
            'company' => 'Company is required',
            'VAT' => 'VAT is required',
            'VAT.integer' => 'VAT must me integer',
            'address' => 'Address is required',
        ];
    }
}
