<?php

namespace App\Services;

use App\Repository\PetRepository;
use App\Http\Requests\PetFormRequest;

class PetService
{
    public function __construct(protected PetRepository $repository) {}

    public function index ()
    {
        return $this->repository->getAllPets();
    }

    public function createPet (PetFormRequest $request)
    {
        return $this->repository->add($request);
    }
}
