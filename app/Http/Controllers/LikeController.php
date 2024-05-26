<?php

namespace App\Http\Controllers;

use App\Models\Like;
use App\Models\Review;
use Illuminate\Http\Request;

class LikeController extends Controller
{

    public function store(Request $request)
    {

        if ($request->user()->can('like-review', Review::find($request->review_id))) {
            $request->user()->likes()->toggle($request->review_id);
            return Review::find($request->review_id)->likes()->whereReview_id($request->review_id)->count();
        }
    }
}
