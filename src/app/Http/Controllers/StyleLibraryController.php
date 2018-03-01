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
        return view('library.index', ['styles' => Style::all(), 'users' => $userMap, 'tags' => Tag::all()]);
    }


}
