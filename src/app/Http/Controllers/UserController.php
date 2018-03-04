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
            $resp = json_encode("{'err': 'no default'}");
            $headers = ['Content-type'=>'text/plain', 'Access-Control-Allow-Origin'=>'*'];
            return response()->make($resp, 404, $headers);
        }
        $default_style = $user->default_style[0]['style'];
        if ($default_style) {
            // header("Access-Control-Allow-Origin: *");
            $headers = ['Content-type'=>'text/plain', 'Access-Control-Allow-Origin'=>'*'];
            return response()->make($default_style, 200, $headers);
        } else {
            return response(500);
        }
    }

    public function index()
    {  // Temp method for testing to view the users
      return view('user.index', ['users' => User::all()]);
    }
}
