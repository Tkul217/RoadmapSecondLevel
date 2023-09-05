<?php

namespace App\Http\Interfaces\Repositories;

use Illuminate\Http\Request;
use Illuminate\Pagination\LengthAwarePaginator;

interface ProjectRepositoryInterface
{
    public function getWithFilters(): LengthAwarePaginator;
}
