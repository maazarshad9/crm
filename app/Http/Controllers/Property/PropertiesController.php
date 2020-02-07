<?php

namespace App\Http\Controllers\Property;

use App\Http\Controllers\Controller;
use App\Models\Property;
use Illuminate\Http\Request;

class PropertiesController extends Controller
{
    public function index(Property $model)
    {
    	return view('properties.index', ['properties' => $model->latest()->paginate(15)]);
    }

    public function create()
    {
        return view('properties.create');
    }

     public function store(Request $request, Property $model)
    {
        $model->create($request->all());
        return redirect()->route('properties.index')->withStatus(__('Property successfully created.'));
    }

    public function edit(Property $property)
    {
        return view('properties.edit', compact('property'));
    }

    public function update(Request $request, Property  $property)
    {
        $property->update(
            $request->all()
        );

        return redirect()->route('properties.index')->withStatus(__('Property successfully updated.'));
    }

    public function destroy(Property  $property)
    {
        $property->delete();

        return redirect()->route('properties.index')->withStatus(__('Property successfully deleted.'));
    }
}
