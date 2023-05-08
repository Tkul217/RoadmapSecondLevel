<?php

namespace App\Policies;

use App\Models\Task;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class TaskPolicy
{
    use HandlesAuthorization;

    public function viewAny(User $user): bool
    {
        return true;
    }

    public function view(User $user, Task $task): bool
    {
        return true;
    }

    public function create(User $user): bool
    {
        return auth()->user()?->hasRole('admin');
    }

    public function update(User $user, Task $task): bool
    {
        return auth()->user()?->hasRole('admin');
    }

    public function delete(User $user, Task $task): bool
    {
        return auth()->user()?->hasRole('admin');
    }

    public function restore(User $user, Task $task): bool
    {
        return auth()->user()?->hasRole('admin');
    }

    public function forceDelete(User $user, Task $task): bool
    {
        return auth()->user()?->hasRole('admin');
    }
}
