<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Style;
use App\User;
use App\Tag;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class PreviewController extends Controller {
    public function index($context, $id = null) {
        switch ($context) {
            case 'embedded':
                return view('preview.embedded');
                break;

            case 'full':
                return view('preview.full');
                break;

            default:
                # Invalid, redirect to home
                return redirect()->route('home');
                break;
        }
    }
}
