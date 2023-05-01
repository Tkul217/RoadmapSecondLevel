<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Client;
use App\Models\Project;
use App\Models\Task;
use App\Models\User;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\PermissionRegistrar;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        app()[PermissionRegistrar::class]->forgetCachedPermissions();

        $roleAdmin = Role::create(['name' => 'admin']);
        $roleUser = Role::create(['name' => 'user']);

        User::factory()
            ->create(['name' => 'Admin', 'email' => 'admin@example.com'])
            ->assignRole($roleAdmin);

        Project::factory()
            ->count(50)
            ->create(['user_id' => User::factory(), 'client_id' => Client::factory()]);

        User::doesntHave('roles')
            ->get()
            ->map(fn($user) => $user->assignRole($roleUser));

        Task::factory()
            ->count(500)
            ->create();
    }
}
