<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Contracts\Validation\Validator;

class UserRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'nome' => ['required', 'max:255'],
            'email' => ['required', 'unique:users', 'email'],
            'senha' => ['required', 'min:5'],
            'ultima_latitude' => ['numeric', 'between:-90,90'],
            'ultima_longitude' => ['numeric', 'between:-180,180']
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
            'nome.required' => 'Atencao, insira um nome',
            'nome.max' => 'Atencao, esse nome e muito grande, maximo 255 caracteres',
            'email.required' => 'Atencao, insira um email',
            'email.unique' => 'Este email ja esta cadastrado',
            'email.email' => 'Insira um email valido',
            'senha.required' => 'Atencao, insira uma senha',
            'senha.min' => 'Senha muito curta. Minimo 5 caracteres',
            'ultima_latitude.required' => 'Informe uma latitude',
            'ultima_latitude.numeric' => 'Atenção, a latitude precisa contar apenas números, sinal negativo (-) ou ponto',
            'ultima_latitude.between' => 'Atenção, a latitude informada está incorreta, deve estar entre -90 e 90 graus',
            'ultima_longitude.required' => 'Informe uma longitude',
            'ultima_longitude.numeric' => 'Atenção, a longitude precisa contar apenas números, sinal negativo (-) ou ponto',
            'ultima_longitude.between' => 'Atenção, a longitude informada está incorreta, deve estar entre -180 e 180 graus'
        ];
    }
}
