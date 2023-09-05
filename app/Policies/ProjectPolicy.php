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
        return auth()->user()?->isAdmin();
    }

    public function update(User $user, Project $project): bool
    {
        return auth()->user()?->isAdmin();
    }

    public function delete(User $user, Project $project): bool
    {
        return auth()->user()?->isAdmin();
    }

    public function restore(User $user, Project $project): bool
    {
        return auth()->user()?->isAdmin();
    }

    public function forceDelete(User $user, Project $project): bool
    {
        return auth()->user()?->isAdmin();
    }
}
