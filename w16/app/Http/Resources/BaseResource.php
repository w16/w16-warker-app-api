<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class BaseResource extends JsonResource
{
    public function __construct($resource)
    {
        $this->additional = [
            'message' => __("response.success"),
            'success' => true
        ];

        parent::__construct($resource);
    }

    /**
     * Transform the resource into an array.
     *
     * @param \Illuminate\Http\Request $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        return parent::toArray($request);
    }

    public function setAditional($key, $value)
    {
        $this->additional[$key] = $value;
        return $this;
    }
}
