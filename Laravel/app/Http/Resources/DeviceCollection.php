<?php

namespace App\Http\Resources;
   
use Illuminate\Http\Resources\Json\JsonResource;
   
class DeviceCollection extends JsonResource
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
            'device_id' => $this->device_id,
            'serial' => $this->serial,
            'description' => $this->description,
            'is_deleted' => $this->is_deleted,
            'estado' => $this->estado
        ];
    }
}