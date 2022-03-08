<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class Reparation_poubelle extends JsonResource
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
        'id_poubelle' => $this->id_poubelle,
        'id_reparateur_poubelle' => $this->id_reparateur_poubelle,
        'description_panne' => $this->description_panne,
        'cout' => $this->cout,
        'date_debut_reparation' => $this->date_debut_reparation,
        'date_fin_reparation' => $this->date_fin_reparation,
        'created_at' => $this->created_at->format('d/m/Y'),
        'updated_at' => $this->updated_at->format('d/m/Y'),
        'deleted_at' => $this->deleted_at,
    ];
    }
}
