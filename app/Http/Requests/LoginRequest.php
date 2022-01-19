<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class LoginRequest extends FormRequest
{
    public function authorize() {
        return true;
    }

    public function rules() {
        return [
            'email' => 'required',
            'password' => 'required'
        ];
    }

    public function messages() {
        return [
            'email.required' => 'Informe seu e-mail.',
            'password.required' => 'Informe sua senha.'
        ];
    }
}