<?php

namespace App\Policies;

use App\Models\Project;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class ProjectPolicy
{
    use HandlesAuthorization;

    public function create(User $user): bool
    {
        return auth()->user()->hasRole('admin');
    }

    public function update(User $user, Project $project): bool
    {
        return auth()->user()?->hasRole('admin');
    }

    public function delete(User $user, Project $project): bool
    {
        return auth()->user()?->hasRole('admin');
    }

    public function restore(User $user, Project $project): bool
    {
        return auth()->user()?->hasRole('admin');
    }

    public function forceDelete(User $user, Project $project): bool
    {
        return auth()->user()?->hasRole('admin');
    }
}
