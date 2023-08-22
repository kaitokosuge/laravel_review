<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;

class userFollowController extends Controller
{
    public function index(User $user)
    {
        return view('User-follow.index')->with(['users' => $user->get()]);
    }
}
