<?php

namespace App\Http\Controllers;

use App\Models\Property;

class PropertyController extends Controller
{
    public function index()
    {
        $properties = Property::latest()->paginate(9);
        return view('properties.index', [
            'properties' => $properties,
            'isHome' => false,
            'hasMoreProperties' => $properties->hasMorePages(),
        ]);
    }

    public function show(Property $property)
    {
        return view('properties.show', compact('property'));
    }
}
