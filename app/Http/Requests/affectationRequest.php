<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class affectationRequest extends FormRequest
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
            'quantite'  => 'required|integer',
            'employee_id'  => 'required',
            'materiel_id'  => 'required'
        ];
    }
}
