<?php

namespace App\Http\Requests\Gestao;

use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Validation\Rule;

class CidadeRequest extends FormRequest
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
        if (in_array($this->method(), ['PUT', 'PATCH'])) {
            $latitude = $this->input('latitude');
            $longitude = $this->input('longitude');

            return [
                'nome_cidade'  => ['required'],
                'latitude'      => ['required', 'regex:/^[-]?(([0-8]?[0-9])\.(\d+))|(90(\.0+)?)$/', Rule::unique('cidades')->ignore($latitude)],
                'longitude'     => ['required', 'regex:/^[-]?((((1[0-7][0-9])|([0-9]?[0-9]))\.(\d+))|180(\.0+)?)$/', Rule::unique('cidades')->ignore($longitude)]
            ];
        } else {
            return [
                'nome_cidade'  => ['required'],
                'latitude'      => ['required', 'regex:/^[-]?(([0-8]?[0-9])\.(\d+))|(90(\.0+)?)$/', 'unique:postos'],
                'longitude'     => ['required', 'regex:/^[-]?((((1[0-7][0-9])|([0-9]?[0-9]))\.(\d+))|180(\.0+)?)$/', 'unique:postos']
            ];
        }
    }

    public function failedValidation(Validator $validator)
    {
        $errors = $validator->errors();

        $response = response()->json([
            'details' => $errors->messages(),
            'message' => 'Erro na aplicação.'
        ], 422);

        throw new HttpResponseException($response);
    }
}
