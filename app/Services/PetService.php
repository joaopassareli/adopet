<?php

namespace App\Services;

use App\Models\Pet;
use App\Repository\PetRepository;
use App\Http\Requests\PetFormRequest;

class PetService
{
    public function __construct(protected PetRepository $repository) {}

    public function index()
    {
        return $this->repository->getAllPets();
    }

    public function createPet(PetFormRequest $request)
    {
        return $this->repository->add($request);
    }

    public function updatePetData(Pet $pet, PetFormRequest $request)
    {
        return $this->repository->update($pet, $request);
    }

    public function destroyPet(int $petId)
    {
        return $this->repository->destroy($petId);
    }

    public function showPet(int $petId)
    {
        return $this->repository->show($petId);
    }
}
