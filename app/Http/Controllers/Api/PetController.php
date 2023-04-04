<?php

namespace App\Http\Controllers\Api;

use App\Models\Pet;
use App\Services\PetService;
use App\Http\Controllers\Controller;
use App\Http\Requests\PetFormRequest;

class PetController extends Controller
{
    public function __construct(protected PetService $petService)
    {
    }

    public function index()
    {
        $pets = $this->petService->index();

        if (empty($pets)) {
            return response()->json(['errorMessage' => 'Pets info not found.'], 404);
        }

        return response()->json(['pets' => $pets], 200);
    }

    public function store(PetFormRequest $request)
    {
        return response()->json($this->petService->createPet($request), 201);
    }

    public function update(Pet $pet, PetFormRequest $request)
    {
        return response()->json($this->petService->updatePetData($pet, $request), 200);
    }

    public function destroy(int $petId)
    {
        return response()->json($this->petService->destroyPet($petId));
    }

    public function show(int $petId)
    {
        return response()->json($this->petService->showPet($petId), 200);
    }
}
