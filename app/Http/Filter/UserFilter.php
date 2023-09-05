<?php

namespace App\Http\Filter;

use App\Http\Abstracts\FilterGenerator;

class UserFilter extends FilterGenerator
{
    public function name($name): void
    {
        $this->builder->where('name', 'like', "%$name%");
    }

    public function email($email): void
    {
        $this->builder->where('email', 'like', "%$email%");
    }
}
