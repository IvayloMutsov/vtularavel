<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Animal;
use App\Models\Breed;
use Illuminate\Support\Str;

class AnimalSeeder extends Seeder
{
    public function run()
    {
        $breeds = Breed::all();

        foreach ($breeds as $breed) {
            // create 3 animals per breed
            for ($i=1; $i<=3; $i++) {
                Animal::create([
                    'name' => $breed->name . ' ' . Str::random(3),
                    'breed_id' => $breed->id,
                    'animal_type_id' => $breed->animal_type_id,
                    'birth_date' => now()->subDays(rand(30, 1000)),
                    'image' => null, // placeholder image or leave null
                ]);
            }
        }
    }
}
