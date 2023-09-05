<?php

namespace App\Http\Generators;

use App\Http\Abstracts\Generator;

class UserTableGenerator extends Generator
{
    protected function actions(): array
    {
        return [
            'show'
        ];
    }

    protected function fields(): array
    {
        return [
            'id',
            'name',
            'email',
            'created_at'
        ];
    }
}
