<?php

namespace App\Http\Controllers\Profile;

use App\Http\Controllers\Controller;
use App\Http\Interfaces\Repositories\UserRepositoryInterface;
use App\Http\Requests\ProfileRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProfileController extends Controller
{
    public function __construct(
        protected UserRepositoryInterface $userRepository
    )
    {
    }

    public function index()
    {
        return view('profile.index', [
            'user' => Auth::user()
        ]);
    }

    public function save(ProfileRequest $request)
    {
        $data = $request->validated();

        $this->userRepository->update($data, Auth::user());

        return redirect()->route('profile.user')->with('success', 'User data successfully updated');
    }
}
