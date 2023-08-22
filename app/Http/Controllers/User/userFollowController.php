<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class userFollowController extends Controller
{
    public function index()
    {
        return view('User-follow.index');
    }
}
