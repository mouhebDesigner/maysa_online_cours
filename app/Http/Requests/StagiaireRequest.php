<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StagiaireRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'nom' => ['required', 'string', 'max:255'],
            'prenom' => ['required', 'string', 'max:255'],
            'numtel' => ['required', 'numeric', 'digits:8', 'unique:users'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'diplome_id' => 'required',
            'classe_id' => 'required',
            'niveau' => 'required',
            'password' => ['required', 'string', 'min:8', 'confirmed'],
            'date_naissance' => ['required'],
        ];
    }
}
