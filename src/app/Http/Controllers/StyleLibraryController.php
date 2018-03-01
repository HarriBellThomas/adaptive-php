<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Style;
use App\User;
use App\Tag;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;


class StyleLibraryController extends Controller {

    public function index() {
        $userMap = [];
        foreach (User::all() as $user) $userMap[$user["id"]] = $user;

        $styleMap = [];
        $tagsMap = [];
        foreach (Style::all() as $style) {
            if("" == $style['name']) {
                $styleMap[$style['id']] = $style;
                $tagsMap[$style['id']] = $style->tags();
            }
        }

        // foreach (Tag::all() as $tag) $tagsMap[$tag['id']] = $tag;

        return view('library.index', ['styles' => $styleMap, 'users' => $userMap, 'tags' => $tagsMap]);
    }


}
