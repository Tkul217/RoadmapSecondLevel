<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserRequest;
use App\Models\User;
use Illuminate\Database\QueryException;

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

    public function create()
    {
        return view('users.create');
    }

    public function store(UserRequest $request)
    {
    }

    public function show(User $user)
    {
        if (!$user){
            abort(404);
        }

        return view('users.show', $user);
    }

    public function edit(User $user)
    {
        if (!$user){
            abort(404);
        }

        return view('users.edit', $user);
    }

    public function update(UserRequest $request, User $user)
    {
        if (!$user){
            abort(404);
        }

        $user->update($request->validated());

        return redirect()->route('users.show', $user);
    }

    public function destroy(User $user)
    {
        if (!$user){
            abort(404);
        }

        try {
            $user->delete();
        } catch (QueryException $exception){
            throw new \Exception('You cannot delete this user, because'. $exception->getMessage());
        }

        return redirect()->route('users.index');
    }
}
