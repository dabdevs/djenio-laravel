<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AccountFormRequest extends FormRequest
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
            'email' => 'string|required',
            'firstname' => 'string|max:150',
            'lastname' => 'string|max:150',
            'name' => 'string|max:150',
            'gender' => 'string',
            'birthdate' => 'string',
            'telephone' => 'string|min:8|max:12',
            'country' => 'integer',
            'city' => 'integer',
            'address' => 'string',
            'genres' => 'array'
        ];
    }
}
