<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Breed;
use App\Models\AnimalType;

class BreedSeeder extends Seeder
{
    public function run()
    {
        $breeds = [
            'Cat' => ['Siamese', 'Persian', 'Maine Coon'],
            'Dog' => ['Labrador', 'German Shepherd', 'Bulldog'],
            'Hamster' => ['Syrian', 'Dwarf', 'Roborovski'],
            'Rabbit' => ['Dutch', 'Lop', 'Lionhead']
        ];

        foreach ($breeds as $typeName => $breedNames) {
            $type = AnimalType::where('name', $typeName)->first();
            foreach ($breedNames as $breedName) {
                Breed::create([
                    'name' => $breedName,
                    'animal_type_id' => $type->id
                ]);
            }
        }
    }
}
