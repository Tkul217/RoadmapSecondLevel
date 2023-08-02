<?php

namespace App\Http\Controllers;

use App\Http\Interfaces\Repositories\UserRepositoryInterface;
use App\Models\User;
class UserController extends Controller
{
    protected $userRepository;
    public function __construct(
        UserRepositoryInterface $userRepository
    )
    {
        $this->userRepository = $userRepository;
    }

    public function index()
    {
        $users = $this->userRepository->getAll();

        return view('users.index', [
            'users' => $users
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
