<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserRequest extends FormRequest
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
      if($this->method()=="POST"){
        return [
            'name' => 'required|string',
            'email' =>'email|required|unique:App\Models\User,email',
            'password' =>'alpha_num|required' 
        ];
      }
       
    }
          
        
    
}
