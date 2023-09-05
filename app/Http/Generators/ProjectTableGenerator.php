<?php

namespace App\Http\Generators;

use App\Http\Abstracts\Generator;

class ProjectTableGenerator extends Generator
{
    protected function fields(): array
    {
        return [
            'id',
            'title',
            'description',
            'deadline',
            'status',
            'created_at'
        ];
    }

    protected function actions(): array
    {
        return [
            'show',
            'edit',
            'destroy'
        ];
    }
}
