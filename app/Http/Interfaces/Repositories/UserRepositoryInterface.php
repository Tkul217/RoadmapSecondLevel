<?php

namespace App\Http\Interfaces\Repositories;

use Illuminate\Pagination\LengthAwarePaginator;

interface UserRepositoryInterface
{
    public function getAll(): LengthAwarePaginator;
    public function getWithRelations(array $relations): LengthAwarePaginator;
}
