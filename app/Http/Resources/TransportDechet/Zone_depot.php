<?php
namespace App\Http\Resources\TransportDechet;

use Illuminate\Http\Resources\Json\JsonResource;

class Zone_depot extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
      //  return parent::toArray($request);

      return [
        'id' => $this->id,
        'adresse' => $this->adresse,
        'longitude' => $this->longitude,
        'latitude' => $this->latitude,
        'quantite_depot_maximale' => $this->quantite_depot_maximale,
        'quantite_depot_actuelle' => $this->quantite_depot_actuelle,
        'created_at' => $this->created_at->format('d/m/Y'),
        'updated_at' => $this->updated_at->format('d/m/Y'),
        'deleted_at' => $this->deleted_at,
    ];
    }
}
