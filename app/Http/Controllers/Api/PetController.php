<?php

namespace App\Http\Controllers\Api;

use App\Models\Pet;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PetController extends Controller
{
    // Fornece o dado de todos os pets já cadastrados
    public function index()
    {
        return Pet::all();
    }

    public function store()
    {}

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
