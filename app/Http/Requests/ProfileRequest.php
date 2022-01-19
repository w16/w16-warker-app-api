<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProfileRequest extends FormRequest
{
    public function authorize() {
        return true;
    }

    public function rules() {
        return [
            'name' => 'required',
            'email' => 'required'
        ];
    }

    public function messages() {
        return [
            'name.required' => 'Preencha o campo nome',
            'email.required' => 'Preencha o campo e-mail.'
        ];
    }
}