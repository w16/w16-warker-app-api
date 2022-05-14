<?php

namespace App\Http\Requests\City;


use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Validation\Rule;

class CreateRequest extends FormRequest
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
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            //
            'nome_da_cidade' => 'required|string',
            'latitude' => 'required|numeric',
            'longitude' => 'required|numeric',
        ];
    }

    public function failedValidation(Validator $validator)
    {
        throw new HttpResponseException(response()->json([
            'success' => false,
            'message' => 'Validation error',
            'data' => $validator->errors()
        ], 403));
    }
    /**
     * Get the error messages for the defined validation rules.
     *
     * @return array
     */
    public function messages()
    {
        return [
            'nome_da_cidade.required' => 'Nome da cidade obrigatório',
            'nome_da_cidade.string' => 'Tipo de dado inválido',
            'latitude.required' => 'Latitude obrigatório',
            'longitude.required' => 'Longitude obrigatório',
            'longitude.numeric' => 'Latitude precisa ser um número',
            'latitude.numeric' => 'Longitude precisa ser um número',
        ];
    }
}
