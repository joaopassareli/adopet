<?php

namespace App\Http\Controllers\Api;

use App\Models\Tutor;
use Illuminate\Http\Request;
use App\Services\TutorService;
use App\Http\Controllers\Controller;
use App\Http\Requests\TutorFormRequest;

class TutorController extends Controller
{
    public function __construct(protected TutorService $tutorService)
    {
    }

    public function index()
    {
        $tutors = $this->tutorService->index();

        if (empty($tutors)) {
            return response()->json(['errorMessage' => 'Tutors info not found.'], 404);
        }

        return response()->json(['tutors' => $tutors], 200);
    }

    public function store(TutorFormRequest $request)
    {
        return response()->json($this->tutorService
            ->createTutor($request), 201);
    }

    public function update(Tutor $tutor, TutorFormRequest $request)
    {
        return response()->json($this->tutorService
        ->updateTutorData($tutor, $request), 200);
    }

    public function destroy(int $tutorId)
    {
        return response()->json($this->tutorService
        ->destroyTutor($tutorId));
    }

    public function show(int $tutorId)
    {
        return response()->json($this->tutorService
        ->showTutor($tutorId), 200);
    }
}
