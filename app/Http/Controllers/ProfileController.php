<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

class ProfileController extends Controller
{
    public function index($user)
    {
        $users = User::findOrFail($user);
        return view('profiles.index', compact('users'));
    }
}
