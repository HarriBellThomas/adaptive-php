<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Style;
use App\User;
use App\Tag;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;


class StyleLibraryController extends Controller
{

  public function index()
  {
    return view('library.index', ['styles' => Style::all(), 'users' => User::all(), 'tags' => Tag::all()]);
  }


}
