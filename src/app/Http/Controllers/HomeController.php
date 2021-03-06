<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Style;
use App\User;
use App\Tag;
use App\Review;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() {

        $styleMap = [];
        $tagsMap = [];
        $ratingsMap = [];

        $styles = Style::where([['name', '<>', ''], ['user_id', '=', Auth::user()->id]])->paginate(8);

        foreach ($styles as $style) {
            $styleMap[$style['id']] = $style;
            $tagsMap[$style['id']] = $style->tags()->get();
            $ratingsMap[$style['id']] = number_format((float)($style->reviews()->avg('stars')), 1, '.', '');
        }

        return view(
            'home',
            [
                'paginator' => $styles,
                'styles' => $styleMap,
                'tags' => $tagsMap,
                'ratings' => $ratingsMap
            ]
        );
    }

}
