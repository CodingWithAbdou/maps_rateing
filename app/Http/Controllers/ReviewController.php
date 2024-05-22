<?php

namespace App\Http\Controllers;

use App\Models\Review;
use Illuminate\Http\Request;

class ReviewController extends Controller
{
    public function store(Request $request)
    {
        if (auth()->user()->reviews()->wherePlace_id($request->place_id)->exists()) {
            return redirect(url()->previous()  . '#review-div');
        }
        Review::create($request->all() + [
            'user_id' => auth()->id(),
        ]);
        return redirect(url()->previous() . '#review-div');
    }
}
