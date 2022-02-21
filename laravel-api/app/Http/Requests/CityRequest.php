<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Contracts\Validation\Validator;
use Symfony\Component\HttpKernel\Exception\HttpException;

class CityRequest extends FormRequest
{
    
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'nome_da_cidade' => ['required', 'max:255'],
            'latitude' => ['required', 'numeric', 'between:-90,90'],
            'longitude' => ['required', 'numeric', 'between:-180,180']
        ];
    }

    /**
     * Return City request errors
     * 
     * @return ?HttpResponseException
     */
    public function failedValidation(Validator $validator)
    {
        throw new HttpResponseException(response()->json([
            'sucesso' => false,
            'mensagem' => 'Verifique os campos enviados.',
            'data' => $validator->errors()
        ]));
    }

    public function messages()
    {
        return [
            'nome_da_cidade.required' => 'O nome da cidade é requerido',
            'nome_da_cidade.unique' => 'Essa cidade já está cadastrada',
            'nome_da_cidade.max' => 'O nome dessa cidade ultrapassa 255 caracteres',
            'latitude.required' => 'Informe uma latitude',
            'latitude.numeric' => 'Atenção, a latitude precisa contar apenas números, sinal negativo (-) ou ponto',
            'latitude.between' => 'Atenção, a latitude informada está incorreta, deve estar entre -90 e 90 graus',
            'longitude.required' => 'Informe uma longitude',
            'longitude.numeric' => 'Atenção, a longitude precisa contar apenas números, sinal negativo (-) ou ponto',
            'longitude.between' => 'Atenção, a longitude informada está incorreta, deve estar entre -180 e 180 graus',            
        ];
    }
}
