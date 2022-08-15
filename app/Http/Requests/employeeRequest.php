<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class employeeRequest extends FormRequest
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
            'cin' => 'required|regex:/^[A-Za-z]{1,2}[0-9]{5,6}$/',
            'nom' => 'required|min:3|max:25',
            'prenom' => 'required|min:3|max:25',
            'telephone' => [ 
                'required',
                'regex:/^(?:(?:(?:\+|00)212[\s]?(?:[\s]?\(0\)[\s]?)?)|0){1}(?:5[\s.-]?[2-3]|6[\s.-]?[13-9]){1}[0-9]{1}(?:[\s.-]?\d{2}){3}$/'
            ],
            'adresse'  => 'required|min:3|max:200',
            'email'   => [ 
                'required',
                'regex:/(.+)@(.+)\.(.+)/i'
            ]         
        ];
    }
}
