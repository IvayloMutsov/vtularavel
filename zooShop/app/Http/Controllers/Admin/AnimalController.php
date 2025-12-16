<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Animal;
use App\Models\Breed;
use App\Models\AnimalType;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class AnimalController extends Controller
{
    // Show all animals (with optional filtering)
    public function index(Request $request)
    {
        $query = Animal::query()->with(['breed', 'animalType']);

        // Filters
        if ($request->filled('name')) {
            $query->where('name', 'like', '%' . $request->name . '%');
        }
        if ($request->filled('breed_id')) {
            $query->where('breed_id', $request->breed_id);
        }
        if ($request->filled('animal_type_id')) {
            $query->where('animal_type_id', $request->animal_type_id);
        }
        if ($request->filled('birth_date')) {
            $query->where('birth_date', $request->birth_date);
        }

        $animals = $query->paginate(10);

        $breeds = Breed::all();
        $types = AnimalType::all();

        return view('admin.animals.index', compact('animals', 'breeds', 'types'));
    }

    // Show create form
    public function create()
    {
        $breeds = Breed::all();
        $types = AnimalType::all();
        return view('admin.animals.create', compact('breeds', 'types'));
    }

    // Store new animal
    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => 'required|string|max:255',
            'breed_id' => 'required|exists:breeds,id',
            'animal_type_id' => 'required|exists:animal_types,id',
            'birth_date' => 'required|date',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        if ($request->hasFile('image')) {
            $data['image'] = $request->file('image')->store('animals', 'public');
        }

        Animal::create($data);

        return redirect()->route('admin.animals.index')->with('success', 'Animal added successfully.');
    }

    // Show edit form
    public function edit(Animal $animal)
    {
        $breeds = Breed::all();
        $types = AnimalType::all();
        return view('admin.animals.edit', compact('animal', 'breeds', 'types'));
    }

    // Update animal
    public function update(Request $request, Animal $animal)
    {
        $data = $request->validate([
            'name' => 'required|string|max:255',
            'breed_id' => 'required|exists:breeds,id',
            'animal_type_id' => 'required|exists:animal_types,id',
            'birth_date' => 'required|date',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        if ($request->hasFile('image')) {
            // Delete old image if exists
            if ($animal->image) {
                Storage::disk('public')->delete($animal->image);
            }
            $data['image'] = $request->file('image')->store('animals', 'public');
        }

        $animal->update($data);

        return redirect()->route('admin.animals.index')->with('success', 'Animal updated successfully.');
    }

    // Delete animal
    public function destroy(Animal $animal)
    {
        if ($animal->image) {
            Storage::disk('public')->delete($animal->image);
        }
        $animal->delete();

        return redirect()->route('admin.animals.index')->with('success', 'Animal deleted successfully.');
    }

    public function show(Animal $animal)
    {
    // Load relationships if needed
    $animal->load(['breed', 'animalType']);
    return view('admin.animals.show', compact('animal'));
    }
}
