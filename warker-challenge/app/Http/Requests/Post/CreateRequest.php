<?php

namespace App\Http\Requests\Post;

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
            'cidade_id' => 'required|integer|exists:App\Models\City,id',
            'reservatorio' => 'required|integer',
            'latitude' => 'required',
            'longitude' => 'required',
        ];
    }

    public function failedValidation(Validator $validator)
    {
        throw new HttpResponseException(response()->json([
            'error' => false,
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
            'cidade_id.required'=>'Informe a cidade',
            'cidade_id.integer'=>'Tipo inválido ',
            'cidade_id.exists'=>'Cidade Inexistente',
            'reservatorio.required' => 'Informe o reservatório',
            'reservatorio.integer' => 'Tipo inválido',
            'latitude.required' => 'Latitude obrigatório',
            'longitude.required' => 'Longitude obrigatório',
        ];
    }
}
