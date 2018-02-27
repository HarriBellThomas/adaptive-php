<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Style;
use App\User;
use App\Tag;
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


  public function store(Request $request)
  {

    $json_string = $request->getContent();
    $json = json_decode($json_string, true);
    $style_object = new Style;
    $style_object->style = $json_string;
    $style_object->user()->associate(Auth::user()->id);
    $style_object->name = $json['title'];
    $style_object->save();

    foreach(array_unique($json['tags']) as $tag) {
      $tag_object = Tag::where('tag_name', $tag)->first();
      if(!$tag_object) {
        $tag_object = new Tag;
        $tag_object->tag_name = $tag;
        $tag_object->description = '';
        $tag_object->save();
      }
      $style_object->tags()->attach($tag_object->id);
    }


    if ($request->default_style) {
      if(sizeof(Auth::user()->default_style) > 0) {
        Auth::user()->default_style()->detach(Auth::user()->default_style[0]->id);
      }
      Auth::user()->default_style()->save($style_object);
    }

    return response()->json(['status' => 'success']);
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
