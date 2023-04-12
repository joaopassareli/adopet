<?php

namespace App\Services;

use App\Models\Tutor;
use Illuminate\Http\Request;
use App\Repository\TutorRepository;
use App\Http\Requests\TutorFormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;

class TutorService
{
    public function __construct(protected TutorRepository $repository) {}

    public function index()
    {
        return $this->repository->getAllTutors();
    }

    public function createTutor(TutorFormRequest $request)
    {
        return $this->repository->add($request);
    }

    public function updateTutorData(Tutor $tutor, TutorFormRequest $request)
    {
        return $this->repository->update($tutor, $request);
    }

    public function destroyTutor(int $tutorId)
    {
        return $this->repository->destroy($tutorId);
    }

    public function showTutor(int $tutorId)
    {
        return $this->repository->show($tutorId);
    }
}

