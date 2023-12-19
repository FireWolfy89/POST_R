<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class ReserveResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'name'=> $this->name,
            'phone_number' => $this-> phone_number,
            'name_of_game' => $this-> name_of_game,
            'due_date'=> $this->due_date,
            'rent_date'=> $this->rent_date,

        ];
    }
}
