<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

class UserController extends Controller
{
    public function show($id)
    {
      return view('user.profile', ['user' => User::findOrFail($id)]);
    }

    public function index()
    {  // Temp method for testing to view the users
      return view('user.index', ['users' => User::all()]);
    }
}
