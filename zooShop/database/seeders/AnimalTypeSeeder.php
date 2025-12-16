<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\AnimalType;

class AnimalTypeSeeder extends Seeder
{
    public function run()
    {
        $types = ['Cat', 'Dog', 'Hamster', 'Rabbit'];

        foreach ($types as $type) {
            AnimalType::create(['name' => $type]);
        }
    }
}
