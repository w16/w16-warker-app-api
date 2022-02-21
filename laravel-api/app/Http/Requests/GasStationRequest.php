<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Contracts\Validation\Validator;

class GasStationRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'cidade_id' => ['required', 'exists:App\Models\City,id'],
            'nome_do_posto' => ['required', 'max:255'],
            'reservatorio' => ['required', 'integer', 'min:1', 'max:100'],
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
            'cidade_id.required' => 'Atenção, informe uma cidade',
            'cidade_id.exists' => 'Essa cidade não esta cadastrada',
            'nome_do_posto.required' => 'Insira o nome do posto',
            'nome_do_posto.unique' => 'Já existe um posto com esse nome',
            'nome_do_posto.max' => 'O nome desse posto ultrapassa 255 caracteres',
            'latitude.required' => 'Informe uma latitude',
            'latitude.numeric' => 'Atenção, a latitude precisa contar apenas números, sinal negativo (-) ou ponto',
            'latitude.between' => 'Atenção, a latitude informada está incorreta, deve estar entre -90 e 90 graus',
            'longitude.required' => 'Informe uma longitude',
            'longitude.numeric' => 'Atenção, a longitude precisa contar apenas números, sinal negativo (-) ou ponto',
            'longitude.between' => 'Atenção, a longitude informada está incorreta, deve estar entre -180 e 180 graus',          
        ];
    }
}
