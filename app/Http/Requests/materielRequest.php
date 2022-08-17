<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class materielRequest extends FormRequest
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
            'nom' => 'required|min:3|max:100|unique:materiaux,nom',
            'marque' => 'required|min:3|max:100',
            'date_entree' => 'required|date',
            'description' => 'min:0|max:200',
            'quantiteStock'  => 'required|integer',
            'photo'  => 'required|image',
            'categorie_id'  => 'required',
            'fournisseur_id'  => 'required'
        ];
    }
}
