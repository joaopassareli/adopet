<?php

namespace App\Repository;

use App\Models\Pet;
use App\Models\Tutor;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Requests\TutorFormRequest;
use Illuminate\Database\Eloquent\Collection;

class TutorRepository
{
    public function getAllTutors(): Collection
    {
        return Tutor::all();
    }

    public function add(TutorFormRequest $request)
    {
        return DB::transaction(function () use($request) {
            $tutor = Tutor::create([
                'name' => $request->name,
                'email' => $request->email,
                'about' => $request->about,
                'profile_picture_url' => $request->profile_picture_url,
            ]);

            return response()->json([
                'message' => 'Tutor saved with success',
                'status' => 201,
                'tutor_id' => $tutor->id,
                'name' => $tutor->name,
                'email' => $tutor->email,
                'about' => $tutor->about,
                'profile_picture_url' => $tutor->profile_picture_url,
            ]);
        });
    }

    public function update(Tutor $tutor, TutorFormRequest $request)
    {
        $tutor->fill($request->all());
        $tutor->save();

        return response()->json([
            'message' => 'Tutor data updated successfully',
            'id' => $tutor->id,
            'status' => 200,
        ]);
    }

    public function destroy(int $tutorId)
    {
        $tutor = Tutor::find($tutorId);

        if (empty($tutor)) {
            return response()->json([
                'message' => 'Tutor with ID ' . $tutorId . ' not found',
                'status' => 404,
            ]);
        }

        Tutor::destroy($tutorId);

        return response()->json([
            'message' => "Tutor {$tutor->name} deleted successfully",
            'id' => $tutor->id,
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
