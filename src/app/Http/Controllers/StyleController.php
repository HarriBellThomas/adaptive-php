<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Style;
use App\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;


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


  private function create_json(Request $request)
  {

    $arr = array('modules' => array(array(
                  array('module' => 'linkHighlighter', 'properties' =>
                                            array('backgroundColor' => $request->linkHighlighter_bgColor,
                                                  'textColor' => $request->linkHighlighter_textColor,
                                                  'size' => $request->linkHighlighter_size)),

                 array('module' => 'motorFeatures', 'properties' =>
                                            array('delay' => $request->clickDelay_delay,
                                                  'doubleClick' => $request->clickDelay_doubleClick)),

                 array('module' => 'colourManipulations', 'properties' =>
                                            array('changeSaturation' => array('factor' => $request->colourManipulations_changeSaturation_factor))),

                 array('module' => 'imageColourShifter', 'propeties' =>
                                            array('identifier' =>  $request->imageColourShifter_name)))));

    return json_encode($arr);
  }

  public function store(Request $request)
  {
    $style = $this->validate(request(), [

      'name' => 'required',

      /* Stuff for the JSON configuration */
      'linkHighlighter_bgColor' => 'required',
      'linkHighlighter_textColor' => 'required',
      'linkHighlighter_size' => 'required',
      'clickDelay_delay' => 'required',
      'colourManipulations_changeSaturation_factor' => 'required',
      'imageColourShifter_name' => 'required',
    ]);

    $json = $this->create_json($request);

    $style_object = new Style;
    $style_object->style = $json;
    $style_object->user()->associate(Auth::user()->id);
    $style_object->name = $request->name;
    // TODO: Add tags to style

    $style_object->save();

    if ($request->default_style) {
      if(sizeof(Auth::user()->default_style) > 0) {
        Auth::user()->default_style()->detach(Auth::user()->default_style[0]->id);
      }
      Auth::user()->default_style()->save($style_object);
    }

    return redirect('/home');
  }

  public function make_default_style($id) {
    $new_default = Style::findOrFail($id);
    if(sizeof(Auth::user()->default_style) > 0) {
      Auth::user()->default_style()->detach(Auth::user()->default_style[0]->id);
    }
    Auth::user()->default_style()->save($new_default);


    return back();
  }

  public function style($id)
  {
    $style = Style::findOrFail($id);
    return response()->json($style['style'], 200);
  }

  public function edit($id)
  {
    $style = Style::findOrFail($id);
    $data = ['style' => $style];
    return view('style.edit', $data);
  }

  public function update(Request $request, $id)
  {
    $this->validate(request(), [

     'name' => 'required',

     /* Stuff for the JSON configuration */
     'linkHighlighter_bgColor' => 'required',
     'linkHighlighter_textColor' => 'required',
     'linkHighlighter_size' => 'required',
     'clickDelay_delay' => 'required',
     'colourManipulations_changeSaturation_factor' => 'required',
     'imageColourShifter_name' => 'required',
    ]);
    Style::find($id)->update($request->all());
    return redirect('/home');

  }
}
