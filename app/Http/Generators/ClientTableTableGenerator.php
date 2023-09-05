<?php

namespace App\Http\Generators;

use App\Http\Abstracts\TableGenerator;

class ClientTableTableGenerator extends TableGenerator
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
            'company',
            'VAT',
            'address',
            'created_at'
        ];
    }
}
