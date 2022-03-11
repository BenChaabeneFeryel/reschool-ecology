<?php

namespace App\Http\Resources\TransportDechet;

use Illuminate\Http\Resources\Json\JsonResource;

class Depot extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
       // return parent::toArray($request);

       return [
        'id' => $this->id,
        'id_zone_depot' => $this->id_zone_depot,
        'id_dechet' => $this->id_dechet,
        'id_camion' => $this->id_camion,
        'date_depot' => $this->date_depot,
        'quantite_depose' => $this->quantite_depose,
        'prix_total' => $this->prix_total,
        'created_at' => $this->created_at->format('d/m/Y'),
        'updated_at' => $this->updated_at->format('d/m/Y'),
        'deleted_at' => $this->deleted_at,
    ];
    }
}
