<?php

namespace App\Http\Resources\Auth;

use App\Http\Resources\BaseResource;

class LoginResource extends BaseResource
{
    /**
     *
     * @param \Illuminate\Http\Request $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        return [
            'access_token' => $this->access_token,
            'token_type' => $this->token_type,
        ];
    }
}
