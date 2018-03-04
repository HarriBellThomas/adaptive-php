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
    public function show($id) {

        $schema = "";

        $style = Style::findOrFail($id);
        $styleDetails = json_decode($style['style']);
        $details = [];
        foreach ($styleDetails->modules as $detail) {
            if($detail->module == "colourManipulations") {
                // foreach ($styleDetails->properties as $key => $detail) {
                //     if($key == "nightShifter") {
                //         $r = [];
                //         $r["enabled"] = $detail;
                //         $details[$key] = $r;
                //     }
                //     else {
                //         $details[$key] = $detail;
                //     }
                // }
            }
            else {
                $details[$detail->module] = $detail->properties;
            }
        }
        return view('style.show', ['style' => $style, 'details' => $styleDetails]);
    }

    public function index() {
        return view('style.index', ['styles' => Style::all()]);
    }

    public function create() {
        $data = [];
        return view('style.create', $data);
    }


    private function stripUnusedModules($module_list) {
        $used_modules = [];
        foreach($module_list as $module) {
            if($module['properties']['enabled']) array_push($used_modules, $module);
        }

        return $used_modules;
    }

    public function store(Request $request) {

        $json_string = $request->getContent();
        $json = json_decode($json_string, true);
        $style_object;
        if ($json['hasSaved']) {
            $style_object = Style::findOrFail($json['id']);
            if($style_object->user->id != Auth::user()->id) { // Stop users editing other's styles
                return response()->json(['status' => 'failure']);
            }
            $style_object->style = json_encode(['modules' => $this->stripUnusedModules($json['modules'])]);
            $style_object->name = $json['title'];
        } else {
            $style_object = new Style;
            $style_object->user()->associate(Auth::user()->id);
            $style_object->style = json_encode(['modules' => $this->stripUnusedModules($json['modules'])]);
            $style_object->name = $json['title'];
        }

        $style_object->save();

        $tag_list = array_unique($json['tags']);
        foreach($tag_list as $tag) {
            $tag_object = Tag::where('tag_name', $tag)->first();
            if(!$tag_object) {
                $tag_object = new Tag;
                $tag_object->tag_name = $tag;
                $tag_object->description = '';
                $tag_object->save();
            }
            $related_tags_ids = [];
            foreach($style_object->tags->all() as $tag) {
                array_push($related_tags_ids, $tag->id);
            }
            if(!in_array($tag_object->id, $related_tags_ids)) {
                $style_object->tags()->attach($tag_object->id);
            }
        }


        if ($json['defaultStyle']) {
            if(sizeof(Auth::user()->default_style) > 0) {
                Auth::user()->default_style()->detach(Auth::user()->default_style[0]->id);
            }
            Auth::user()->default_style()->save($style_object);
        }

        return response()->json(['status' => 'success', 'id' => $style_object->id]);
    }

    public function make_default_style($id) {
        $new_default = Style::findOrFail($id);
        if(sizeof(Auth::user()->default_style) > 0) {
            Auth::user()->default_style()->detach(Auth::user()->default_style[0]->id);
        }
        Auth::user()->default_style()->save($new_default);

        return back();
    }

    public function style($id) {
        $style = Style::findOrFail($id);
        $headers = ['Content-type'=>'text/plain', 'Access-Control-Allow-Origin'=>'*'];
        return response()->make($style['style'], 200, $headers);
    }

    public function edit($id) {
        $style = Style::findOrFail($id);
        $defaultStyle = 0;
        if (count(Auth::user()->default_style) > 0 && Auth::user()->default_style[0]->id == $style->id) {
            $defaultStyle = 1;
        }

        $data = [
            'title' => $style->name,
            'id' => $style->id,
            'saved' => true,
            'hasSaved' => true,
            'defaultStyle' => $defaultStyle,
            'tags' => $style->tags,
            'modules' => json_decode($style->style)->modules
        ];
        return view('style.edit', $data);
    }

    public function update(Request $request, $id) {
        store($this->$request);
    }
}
