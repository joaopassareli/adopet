<?php

namespace App\Repository;

use App\Models\Pet;
use Illuminate\Support\Facades\DB;
use App\Http\Requests\PetFormRequest;
use Illuminate\Database\Eloquent\Collection;

class PetRepository
{

    public function getAllPets(): Collection
    {
        return Pet::all();
    }

    public function add(PetFormRequest $request): Pet
    {
        return DB::transaction(function () use($request) {
            $pet = Pet::create([
                'name' => $request->name,
                'species' => $request->species,
                'size' => $request->size,
                'personality' => $request->personality,
                'city' => $request->city,
                'state' => $request->state,
                'owner' => $request->owner,
                'profilePictureUrl' => $request->profilePictureUrl,
                'status' => $request->status,
                'statusDate' => $request->statusDate
            ]);

            return $pet;
        });
    }
}
