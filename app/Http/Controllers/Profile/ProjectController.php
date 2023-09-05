<?php

namespace App\Http\Controllers\Profile;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class ProjectController extends Controller
{
    public function __invoke(){
        return redirect()->route('projects.index', ['user' => Auth::id()]);
    }
}
