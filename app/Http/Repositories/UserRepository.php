<?php

namespace App\Http\Repositories;

use App\Http\Filter\UserFilter;
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

    public function getWithFilters(): LengthAwarePaginator
    {
        $filter = new UserFilter(
            User::query(),
            request()
        );

        return $filter->apply()->paginate();
    }

    public function getWithRelations(array $relations): LengthAwarePaginator
    {
        return User::query()
            ->with($relations)
            ->paginate();
    }

    public function update(array $data, User $user): bool
    {
        return $user->update($data);
    }
}
