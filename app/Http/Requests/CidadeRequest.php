<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

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
        switch($this->method()){
            case "GET":
            case "DELETE":
                {
                   return []; 
                }
            case "POST":
                {
                    return [
                        'nome_da_cidade' => 'required|string|unique:App\Models\Cidade,nome_da_cidade',
                        'latitude' =>'required|numeric',
                        'longitude' =>'required|numeric'
                    ];
                }
            case "PUT":
                {
                    return [
                        'nome_da_cidade' => 'string|unique:App\Models\Cidade,nome_da_cidade,'.$this->get("id"),
                        'latitude' =>'numeric',
                        'longitude' =>'numeric'
                        
                    ];
                }
        }
    }
  
}
