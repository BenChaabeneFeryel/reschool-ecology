<?php

namespace App\Http\Resources\GestionPoubelleEtablissements;

use Illuminate\Http\Resources\Json\JsonResource;

class Poubelle extends JsonResource{
    public function toArray($request) {
      return [
        'id' => $this->id,

        'id_bloc_poubelle' => $this->id_bloc_poubelle,
        'nom' => $this->nom,
        'qrcode' => $this->qrcode,
        'capacite_poubelle' => $this->capacite_poubelle,
        'type' => $this->type,
        'Etat' => $this->Etat,
        'temps_remplissage' => $this->temps_remplissage,

        'created_at' => $this->created_at->format('d/m/Y'),
        'updated_at' => $this->updated_at->format('d/m/Y'),
        'deleted_at' => $this->deleted_at,
    ];
    }
}
