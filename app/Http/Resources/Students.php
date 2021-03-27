<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class Students extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
        'id'         => $this->id,
        'cne'       => $this->cne,
        'FirstName'       => $this->FirstName,
        'age'    => (int) $this->age,
        'LastName'       => $this->LastName,
        'email'       => $this->email,
        'specialty'       => $this->specialty,
        'created_at' => $this->created_at,
        'updated_at' => $this->updated_at,
        ];
    }
}
