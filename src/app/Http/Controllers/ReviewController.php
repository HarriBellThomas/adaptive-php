<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Review;
use Illuminate\Support\Facades\Auth;




class ReviewController extends Controller {
    public function store(Request $request) {
        $style = $this->validate(request(), [
            'rating' => 'required',
            'review' => 'required'
        ]);

        $review_object = new Review;
        $review_object->review = $request->review;
        $review_object->stars = $request->rating;

        $review_object->user()->associate(Auth::user()->id);
        $review_object->style()->associate(request()->style_id);
        $review_object->save();

        return back();
    }
}
