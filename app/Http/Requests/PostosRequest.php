<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PostosRequest extends FormRequest
{
    public function authorize() {
        return true;
    }

    public function rules()
    {
        return [
            'cidade_id' => 'required',
            'reservatorio' => 'required',
            'latitude' => 'required',
            'longitude' => 'required'
        ];
    }

    public function messages() {
        return [
            'cidade_id.required' => 'Informe a cidade.',
            'reservatorio.required' => 'Informe a quantidade no reservatório.',
            'latitude.required' => 'Informe sua latitude.',
            'longitude.required' => 'Informe sua longitude.'
        ];
    }
}