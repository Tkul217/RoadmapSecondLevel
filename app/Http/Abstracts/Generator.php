<?php

namespace App\Http\Abstracts;

abstract class Generator
{
    public function handle(): array
    {
        $data = [];

        $data['fields'] = $this->fields();

        $data['actions'] = $this->actions();

        return $data;
    }

    abstract protected function fields(): array;

    abstract protected function actions(): array;
}
