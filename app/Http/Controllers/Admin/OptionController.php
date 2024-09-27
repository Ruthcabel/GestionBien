<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\OptionFormRequest;
use App\Models\Option;
use Illuminate\Http\Request;

class OptionController extends Controller
{
    public function index()
    {
        return view('admin.option.index', ['options' => Option::latest()->paginate(16)]);
    }

    public function create()
    {
        $option = new Option();
        return view('admin.option.form', ['option' => $option]);
    }

    public function store(OptionFormRequest $request)
    {
        Option::create($request->validated());
        return to_route('admin.option.index')->with('success', 'option enregistré avec succès');
    }

    public function edit(Option $option)
    {
        return view('admin.option.form', ['option' => $option]);
    }

    public function update(OptionFormRequest $request, Option $option)
    {
        $option->update($request->validated());
        return to_route('admin.option.index')->with('success', 'option modifié avec succès');
    }

    public function destroy(Option $option)
    {
        $option->delete();
        return to_route('admin.option.index')->with('success', 'option supprimé avec succès');
    }
}
