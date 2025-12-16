<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\AnimalType;
use Illuminate\Http\Request;

class AnimalTypeController extends Controller
{
    // Show all types
    public function index()
    {
        $types = AnimalType::paginate(10);
        return view('admin.animal_types.index', compact('types'));
    }

    // Show create form
    public function create()
    {
        return view('admin.animal_types.create');
    }

    // Store new type
    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => 'required|string|max:255|unique:animal_types,name',
        ]);

        AnimalType::create($data);

        return redirect()->route('admin.animal-types.index')->with('success', 'Animal type added successfully.');
    }

    // Show edit form
    public function edit(AnimalType $animalType)
    {
        return view('admin.animal_types.edit', compact('animalType'));
    }

    // Update type
    public function update(Request $request, AnimalType $animalType)
    {
        $data = $request->validate([
            'name' => 'required|string|max:255|unique:animal_types,name,' . $animalType->id,
        ]);

        $animalType->update($data);

        return redirect()->route('admin.animal-types.index')->with('success', 'Animal type updated successfully.');
    }

    // Delete type
    public function destroy(AnimalType $animalType)
    {
        $animalType->delete();
        return redirect()->route('admin.animal-types.index')->with('success', 'Animal type deleted successfully.');
    }
}
