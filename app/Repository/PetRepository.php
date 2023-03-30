<?php

namespace App\Repository;

use App\Models\Pet;
use Illuminate\Database\Eloquent\Collection;

class PetRepository
{
    public function getAllPets(): Collection
    {
        return Pet::all();
    }

    public function teste()
    {
        return Pet::all();
    }
}
