<?php

namespace App\Http\Requests;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Http\Exceptions\HttpResponseException;

use Illuminate\Foundation\Http\FormRequest;

class PetFormRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\Rule|array|string>
     */
    public function rules(): array
    {
        return [
            'name' => ['required', 'min:3', 'max:255'],
            'species' => ['required', 'min:3', 'max:255'],
            'size' => ['required', 'min:3', 'max:255'],
            'personality' => ['required', 'min:3', 'max:255'],
            'city' => ['required', 'min:3', 'max:50'],
            'state' => ['required', 'max:2'],
            'owner' => ['min:3', 'max:255'],
            'profile_picture_url' => [ 'min:3', 'max:255'],
            'status' => ['required', 'min:3', 'max:255'],
            'status_date' => ['date'],
        ];
    }

    public function messages(): array
    {
        return [
            'name.required' => 'O campo nome é obrigatório e deve ser preenchido',
            'name.min' => 'O campo nome deve possuir ao menos :min caracteres.',
            'name.max' => 'O campo nome não pode possuir mais que :max caracteres',
            //
            'species.required' => 'O campo especie é obrigatório e deve ser preenchido',
            'species.min' => 'O campo especie deve possuir ao menos :min caracteres.',
            'species.max' => 'O campo especie não pode possuir mais que :max caracteres',
            //
            'personality.required' => 'O campo personalidade é obrigatório e deve ser preenchido',
            'personality.min' => 'O campo personalidade deve possuir ao menos :min caracteres.',
            'personality.max' => 'O campo personalidade não pode possuir mais que :max caracteres',
            //
            'city.required' => 'O campo Cidade é obrigatório e deve ser preenchido',
            'city.min' => 'O campo Cidade deve possuir ao menos :min caracteres.',
            'city.max' => 'O campo Cidade não pode possuir mais que :max caracteres',
            //
            'state.required' => 'O campo Estado é obrigatório e deve ser preenchido',
            //
            'status.require' => 'O campo Status é obrigatório e deve ser preenchido',

        ];
    }

    protected function failedValidation(Validator $validator)
    {
        throw new HttpResponseException(response()->json($validator->errors(), 422));
    }
}
