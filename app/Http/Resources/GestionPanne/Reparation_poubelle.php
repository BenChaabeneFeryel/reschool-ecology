<?php

namespace App\Http\Resources\GestionPanne;

use Illuminate\Http\Resources\Json\JsonResource;

class Reparation_poubelle extends JsonResource{
    public function toArray($request)
    {
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
