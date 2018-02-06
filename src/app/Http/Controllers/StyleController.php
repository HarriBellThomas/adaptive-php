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

  public function create()
  {
    $data = [];
    return view('style.create', $data);
  }

  public function store($request)
  {
    $style = $this->validate(request(), [
      'default_style' => 'required|boolean',

      /* Stuff for the JSON configuration */
      'linkHighlighter-bgColor' => 'required',
      'linkHighlighter-textColor' => 'required',
      'linkHighlighter-size' => 'required',
      'clickDelay-delay' => 'required',
      'clickDelay-doubleClick' => 'boolean|required',
      'colourManipulations-changeSaturation-factor' => 'required',
      'imageColourShifter-name' => 'required',
    ]);

    $json = create_json($style);

    $style_object = new Style;
    $style_object->style = $json;
    $style_object->user = Auth::user()->id;
    Auth::user()->styles()->attach($style_object->id);
    // TODO: Add tags to style

    if ($request->default_style) {
      Auth::user()->default_style()->save($style_object)
    }
    $style_object->save();
  }


  public function style($id)
  {
    $style = Style::findOrFail($id);
    return response()->json($style['style'], 200);
  }

}
