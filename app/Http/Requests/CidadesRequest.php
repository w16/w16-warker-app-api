<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CidadesRequest extends FormRequest
{
    public function authorize() {
        return true;
    }

    public function rules()
    {
        return [
            'nome_da_cidade' => 'required',
            'latitude' => 'required',
            'longitude' => 'required'
        ];
    }

    public function messages() {
        return [
            'nome_da_cidade.required' => 'Informe o nome da cidade.',
            'latitude.required' => 'Informe sua latitude.',
            'longitude.required' => 'Informe sua longitude.',
        ];
    }
}