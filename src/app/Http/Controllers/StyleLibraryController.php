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
        foreach (Style::all() as $style) {
            if("" !== trim($style['name'])) {
                $styleMap[$style['id']] = $style;
                $tagsMap[$style['id']] = $style->tags()->get();
                $ratingsMap[$style['id']] = number_format((float)($style->reviews()->avg('stars')), 2, '.', '');
            }
        }

        // foreach (Tag::all() as $tag) $tagsMap[$tag['id']] = $tag;

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

    private function ratingForStyle($style_id) {
        $reviews = Review::where("style_id", $style_id)->get();
        $score = 0;
        $total = 0;
        foreach ($reviews as $review) {
            $score += $review->stars;
            $total++;
        }

        if($total > 0) return $score / $total;
        else return -1;
    }

}
