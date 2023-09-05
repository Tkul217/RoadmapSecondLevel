<?php

namespace App\Http\Generators;

use App\Http\Abstracts\Generator;

class TaskTableGenerator extends Generator
{
    protected function actions(): array
    {
        return [
          'show',
          'edit',
          'destroy'
        ];
    }

    protected function fields(): array
    {
        return [
            'id',
            'user',
            'project',
            'title',
            'description',
            'status'
        ];
    }
}
