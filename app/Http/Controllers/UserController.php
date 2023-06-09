<?php

namespace App\Http\Controllers;

use App\Models\User;
class UserController extends Controller
{
    public function index()
    {
        $users = User::query()
            ->with('tasks', 'projects')
            ->paginate();

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
