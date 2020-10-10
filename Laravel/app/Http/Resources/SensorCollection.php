<?php

namespace App\Http\Resources;
   
use Illuminate\Http\Resources\Json\JsonResource;
   
class SensorCollection extends JsonResource
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
            'serial' => $this->serial,
            'temperatura' => $this->temperatura,
            'humedad' => $this->humedad,
            'tiempo' => $this->tiempo,
            'is_deleted'=>$this->is_deleted
        ];
    }
}