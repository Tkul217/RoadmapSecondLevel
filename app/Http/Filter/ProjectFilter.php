<?php

namespace App\Http\Filter;

use App\Http\Abstracts\FilterGenerator;

class ProjectFilter extends FilterGenerator
{
    public function title($value): void
    {
        $this->builder->where('title', 'like', "%$value%");
    }

    public function description($value): void
    {
        $this->builder->where('description', 'like', "%$value%");
    }

    public function status($value): void
    {
        $this->builder->where('status', $value);
    }
}
