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

    public function default_style($id)
    {
      $user = User::findOrFail($id);
      if (count($user->default_style) == 0) {
        return response()->json("{'err': 'no default'}");
      }
      $default_style = $user->default_style[0]['style'];
      if ($default_style) {
        return response()->json($default_style, 200);
      } else {
        return response(500);
      }
    }

    public function index()
    {  // Temp method for testing to view the users
      return view('user.index', ['users' => User::all()]);
    }
}
