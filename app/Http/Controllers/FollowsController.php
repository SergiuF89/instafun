<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class FollowsController extends Controller
{
    public function __construct()
    {
          $this->middleware('auth'); /* aici setam sa apara unauthorized 401 in loc de 500 daca nu suntem logati */
    }

    public function store(User $user)
    {
            return auth()->user()->following()->toggle($user->profile);
    }
}
