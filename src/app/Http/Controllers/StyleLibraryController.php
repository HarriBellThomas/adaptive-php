<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Style;
use App\User;
use App\Tag;
use App\Review;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;


class StyleLibraryController extends Controller {

    public function index() {
        $userMap = [];
        foreach (User::all() as $user) $userMap[$user["id"]] = $user;

        $styleMap = [];
        $tagsMap = [];
        $ratingsMap = [];

        $styles = Style::where('name', '<>', '')->simplePaginate(2);

        foreach ($styles as $style) {
            $styleMap[$style['id']] = $style;
            $tagsMap[$style['id']] = $style->tags()->get();
            $ratingsMap[$style['id']] = number_format((float)($style->reviews()->avg('stars')), 1, '.', '');
        }

        return view(
            'library.index',
            [
                'styles' => $styleMap,
                'users' => $userMap,
                'tags' => $tagsMap,
                'ratings' => $ratingsMap
            ]
        );
    }


}
