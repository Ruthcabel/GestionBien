<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\PropertyFormRequest;
use App\Models\Option;
use App\Models\Property;
use Illuminate\Http\Request;

class PropertyController extends Controller
{
    public function index()
    {
        return view('admin.property.index', ['properties' => Property::latest()->paginate(16)]);
    }

    public function create()
    {
        $property = new Property();
        $property->fill([
            'surface' => 40,
            'rooms' => 3,
            'bedrooms' => 1,
            'floor' => 0,
            'city' => 'Ngaoundéré',
            'postal_code' => 45500,
            'sold' => false,
        ]);
        return view('admin.property.form', ['property' => $property, 'options' => Option::pluck('name', 'id')]);
    }

    public function store(PropertyFormRequest $request)
    {
        $property = Property::create($request->validated());
        $property->options()->sync($request->validated('options'));
        return to_route('admin.property.index')->with('success', 'bien enregistré avec succès');
    }

    public function edit(Property $property)
    {
        return view('admin.property.form', ['property' => $property, 'options' => Option::pluck('name', 'id')]);
    }

    public function update(PropertyFormRequest $request, Property $property)
    {
        $property->options()->sync($request->validated('options'));
        $property->update($request->validated());
        return to_route('admin.property.index')->with('success', 'bien modifié avec succès');
    }

    public function destroy(Property $property)
    {
        $property->delete();
        return to_route('admin.property.index')->with('success', 'bien supprimé avec succès');
    }
}
