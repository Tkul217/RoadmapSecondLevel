<?php

namespace App\Http\Controllers;

use App\Http\Filter\UserFilter;
use App\Http\Generators\UserTableTableGenerator;
use App\Http\Interfaces\Repositories\UserRepositoryInterface;
use App\Models\User;
class UserController extends Controller
{
    public function __construct(
        protected UserRepositoryInterface $userRepository
    )
    {
    }

    public function index(
        UserTableTableGenerator $generator
    )
    {
        $users = $this->userRepository->getWithFilters();

        return view('users.index', [
            'users' => $users,
            'table' => $generator->handle()
        ]);
    }

    public function show(User $user)
    {
        if (!$user){
            abort(404);
        }

        return view('users.show', $user, [
            'user' => $user
        ]);
    }
}
