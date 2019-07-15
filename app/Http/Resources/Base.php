<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class Base extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        dump($this->resource);die;
        return parent::toArray($request);
    }
}
