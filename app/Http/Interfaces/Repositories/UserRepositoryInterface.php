<?php

namespace App\Http\Interfaces\Repositories;

use App\Models\User;
use Illuminate\Pagination\LengthAwarePaginator;

interface UserRepositoryInterface
{
    public function getAll(): LengthAwarePaginator;
    public function getWithRelations(array $relations): LengthAwarePaginator;
    public function update(array $data, User $user): bool;
}
