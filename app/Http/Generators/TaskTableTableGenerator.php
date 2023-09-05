<?php

namespace App\Http\Generators;

use App\Http\Abstracts\TableGenerator;

class TaskTableTableGenerator extends TableGenerator
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
