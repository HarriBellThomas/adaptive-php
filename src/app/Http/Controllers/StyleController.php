<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Style;

class StyleController extends Controller
{
  public function show($id)
  {
    return view('style.show', ['style' => Style::findOrFail($id)]);
  }

  public function index()
  {
    return view('style.index', ['styles' => Style::all()]);
  }
}
