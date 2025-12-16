<?php

namespace App\Http\Controllers;

use App\Models\Animal;
use App\Models\Breed;
use App\Models\AnimalType;
use Illuminate\Http\Request;

class PublicController extends Controller
{
    // Home page - show latest animals
    public function home()
    {
        $latestAnimals = Animal::latest()->take(10)->with(['breed', 'animalType'])->get();
        return view('public.home', compact('latestAnimals'));
    }

    // List animals with filters
    public function listAnimals(Request $request)
    {
        $query = Animal::query()->with(['breed', 'animalType']);

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

        return view('public.animals.index', compact('animals', 'breeds', 'types'));
    }

    // Show single animal details
    public function showAnimal(Animal $animal)
    {
        $animal->load(['breed', 'animalType']);
        return view('public.animals.show', compact('animal'));
    }
}
