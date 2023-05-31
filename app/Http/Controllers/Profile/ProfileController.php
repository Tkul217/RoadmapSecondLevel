<?php

namespace App\Http\Controllers\Profile;

use App\Http\Controllers\Controller;
use App\Http\Requests\ProfileRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProfileController extends Controller
{
    public function index()
    {
        return view('profile.index', [
            'user' => Auth::user()
        ]);
    }

    public function save(ProfileRequest $request)
    {
        $data = $request->validated();

        Auth::user()?->update($data);

        return redirect()->route('profile.user')->with('success', 'User data successfully updated');
    }
}
