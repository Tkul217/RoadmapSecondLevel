<?php

namespace App\Http\Filter;

use App\Http\Abstracts\FilterGenerator;

class ClientFilter extends FilterGenerator
{
    public function company($company): void
    {
        $this->builder->where('company', 'like', "%{$company}%");
    }

    public function vat($vat): void
    {
        $this->builder->where('VAT', 'like', "%{$vat}%");
    }

    public function address($address): void
    {
        $this->builder->where('address', 'like', "%{$address}%");
    }
}
