<?php

namespace App\Http\Generators;

use App\Http\Abstracts\TableGenerator;

class UserTableTableGenerator extends TableGenerator
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
