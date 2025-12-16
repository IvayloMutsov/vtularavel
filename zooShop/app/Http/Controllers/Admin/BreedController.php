<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Breed;
use App\Models\AnimalType;
use Illuminate\Http\Request;

class BreedController extends Controller
{
    // Show all breeds
    public function index()
    {
        $breeds = Breed::with('animalType')->paginate(10);
        return view('admin.breeds.index', compact('breeds'));
    }

    // Show create form
    public function create()
    {
        $types = AnimalType::all();
        return view('admin.breeds.create', compact('types'));
    }

    // Store new breed
    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => 'required|string|max:255',
            'animal_type_id' => 'required|exists:animal_types,id',
        ]);

        Breed::create($data);

        return redirect()->route('admin.breeds.index')->with('success', 'Breed added successfully.');
    }

    // Show edit form
    public function edit(Breed $breed)
    {
        $types = AnimalType::all();
        return view('admin.breeds.edit', compact('breed', 'types'));
    }

    // Update breed
    public function update(Request $request, Breed $breed)
    {
        $data = $request->validate([
            'name' => 'required|string|max:255',
            'animal_type_id' => 'required|exists:animal_types,id',
        ]);

        $breed->update($data);

        return redirect()->route('admin.breeds.index')->with('success', 'Breed updated successfully.');
    }

    // Delete breed
    public function destroy(Breed $breed)
    {
        $breed->delete();
        return redirect()->route('admin.breeds.index')->with('success', 'Breed deleted successfully.');
    }
}
