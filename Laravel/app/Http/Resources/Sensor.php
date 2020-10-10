<?php

namespace App\Http\Resources;
   
use Illuminate\Http\Resources\Json\JsonResource;
   
class Sensor extends JsonResource
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
            'id' => $this->id,
            'dispositivo' => $this->dispositivo,
            'temperatura' => $this->temperatura,
            'humedad' => $this->humedad,
            'tiempo' => $this->tiempo,
        ];
    }
}