<?php

namespace App\Http\Controllers;

use App\Services\PetService;
use Illuminate\Http\Request;

class PetController extends Controller
{
    public function __construct(protected PetService $petService)
    {}

    public function index()
    {
        $successMessage = session('success.message');
        $pets = $this->petService->index();

        return view('pets.index')
            ->with('successMessage', $successMessage)
            ->with('pets', $pets);
    }

    public function create()
    {
        return view('pets.create');
    }

    public function store()
    {
        return;
    }

    public function destroy()
    {
        return;
    }

    public function show()
    {
        return;
    }
}
