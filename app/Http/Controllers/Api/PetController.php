<?php

namespace App\Http\Controllers\Api;

use App\Models\Pet;
use Illuminate\Http\Request;
use App\Repository\PetRepository;
use App\Http\Controllers\Controller;
use App\Http\Requests\PetFormRequest;

class PetController extends Controller
{
    public function __construct(private PetRepository $petRepository)
    {
    }

    public function index()
    {
        $pets = $this->petRepository->getAllPets();

        if (empty($pet)) {
            return response()->json(['errorMessage' => 'Pets info not found.'], 404);
        }

        return response()->json(['pets' => $pets], 200);
    }

    public function store(PetFormRequest $request)
    {
        return response()->json($this->petRepository->add($request), 201);
    }

    public function update()
    {}

    public function destroy()
    {}


    /**
     * Show a pet from a id given
     *
     * @param  int $pet with the pet Id
     * @return Pet with all the data from the Pet where the id was Given
     */
    public function show(int $pet)
    {
        $pet = Pet::whereId($pet)
            ->with('seasons.episodes')
            ->first();

        return $pet;
    }
}
