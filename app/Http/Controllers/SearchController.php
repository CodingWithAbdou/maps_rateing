<?php

namespace App\Http\Controllers;

use App\Models\Place;
use Illuminate\Http\Request;

class SearchController extends Controller
{
    public function autoComplete()
    {
        if (request()->address) {
            $value = request()->address;
            $data = Place::where('address', 'LIKE', "%$value%")->get();
            $html =  '<ul  class="0 rounded bg-gray-100  py-2">';
            foreach ($data as $row) {
                $html .=  '<li class="flex px-6 bg-gray-100 items-center justify-between my-8 hover:bg-gray-50">' . $row->address . '</li>';
            }
            $html .= '</ul>';

            return $html;
        }
    }

    public function search(Request $request)
    {
        $places = Place::search($request)->get();
        return view('list', compact('places'));
    }
}
