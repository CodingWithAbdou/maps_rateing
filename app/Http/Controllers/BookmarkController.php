<?php

namespace App\Http\Controllers;

use App\Models\Place;
use Illuminate\Http\Request;

class BookmarkController extends Controller
{
    public function store(Request $request, Place $place)
    {
        $request->user()->bookmarks()->toggle($place->id);
        return back();
    }

    public function show()
    {
        $places = auth()->user()->bookmarks;
        return view('bookmark', compact('places'));
    }
}
