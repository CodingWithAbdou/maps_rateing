<?php

namespace App\Http\Controllers;

use App\Models\Place;
use App\Traits\ReviewTrait;
use Illuminate\Http\Request;

class PlaceController extends Controller
{
    use ReviewTrait;
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $places = Place::class::orderBy('view_count', 'desc')->take(3)->get();
        return view('welcome', compact('places'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('craete_palce');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        if ($request->image) {
            $imageName = time() . '.' . $request->image->extension();
            $request->image->storeAs('public\images', $imageName);
            $request->user()->places()->create($request->except('image') + ['image' => $imageName]);
        } else {
            $request->user()->places()->create($request->all());
        }

        return back();
    }

    /**
     * Display the specified resource.
     */
    public function show(Place $place)
    {

        $avg = $this->averageRating($place);
        $place = $place->withCount('reviews')->with(['reviews' => function ($query) {
            $query->with('user')
                ->withCount('likes');
        }])->find($place->id);
        $total =  $avg['total'];
        $service_rating =  $avg['service_rating'];
        $quality_rating =  $avg['quality_rating'];
        $cleanliness_rating =  $avg['cleanliness_rating'];
        $pricing_rating =  $avg['pricing_rating'];
        return view('show', compact('place', 'total', "service_rating", "quality_rating", "cleanliness_rating", "pricing_rating"));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
