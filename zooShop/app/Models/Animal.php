<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Animal extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'breed_id', 'animal_type_id', 'birth_date', 'image'];

    public function breed()
    {
        return $this->belongsTo(Breed::class);
    }

    public function animalType()
    {
        return $this->belongsTo(AnimalType::class);
    }
}
