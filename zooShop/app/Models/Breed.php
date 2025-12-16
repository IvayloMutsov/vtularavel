<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Breed extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'animal_type_id'];

    public function animalType()
    {
        return $this->belongsTo(AnimalType::class);
    }

    public function animals()
    {
        return $this->hasMany(Animal::class);
    }
}
