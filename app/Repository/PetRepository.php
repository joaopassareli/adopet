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

    public function add(PetFormRequest $request)
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
                'profile_picture_url' => $request->profile_picture_url,
                'status' => $request->status,
                'status_date' => $request->status_date
            ]);

            return response()->json([
                'message' => 'Pet saved with success',
                'status' => 201,
                'pet_id' => $pet->id,
                'pet' => $pet,
            ]);
        });
    }

    public function update(Pet $pet, PetFormRequest $request)
    {
        $pet->fill($request->all());
        $pet->save();

        return response()->json([
            'message' => 'Pet data updated successfully',
            'id' => $pet->id,
            'status' => 200,
        ]);
    }

    public function destroy(int $petId)
    {
        $pet = Pet::find($petId);

        if (empty($pet)) {
            return response()->json([
                'message' => 'Pet with ID ' . $petId . ' not found',
                'status' => 404,
            ]);
        }

        Pet::destroy($petId);

        return response()->json([
            'message' => "Pet {$pet->name} deleted successfully",
            'id' => $pet->id,
        ]);
    }

    public function show(int $petId)
    {
        $pet = Pet::find($petId);

        if (empty($pet)) {
            return response()->json([
                'message' => 'Pet not found',
                'status' => 404,
            ]);
        }

        return response()->json([
            'status' => 200,
            'pet' => $pet,
        ]);
    }
}
