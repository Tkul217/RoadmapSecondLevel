<?php

namespace App\Http\Repositories;

use App\Http\Interfaces\Repositories\UserRepositoryInterface;
use App\Models\User;
use Illuminate\Pagination\LengthAwarePaginator;

class UserRepository implements UserRepositoryInterface
{
    public function getAll(): LengthAwarePaginator
    {
        return User::query()
            ->paginate();
    }

    public function getWithRelations(array $relations): LengthAwarePaginator
    {
        return User::query()
            ->with($relations)
            ->paginate();
    }
}