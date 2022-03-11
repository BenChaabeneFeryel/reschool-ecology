<?php

namespace App\Http\Resources\GestionPoubelleEtablissements;

use Illuminate\Http\Resources\Json\JsonResource;

class Etablissement extends JsonResource{
    public function toArray($request)
    {
        return [
            'id' => $this->id,

            'id_zone_travail' => $this->id_zone_travail,
            'id_responsable_etablissement' => $this->id_responsable_etablissement,
            'nom_etablissement' => $this->nom_etablissement,
            'nbr_personnes' => $this->nbr_personnes,
            'adresse' => $this->adresse,
            'longitude' => $this->longitude,
            'latitude' => $this->latitude,
            'quantite_dechets_plastique' => $this->quantite_dechets_plastique,
            'quantite_dechets_composte' => $this->quantite_dechets_composte,
            'quantite_dechets_papier' => $this->quantite_dechets_papier,
            'quantite_dechets_canette' => $this->quantite_dechets_canette,

            'created_at' => $this->created_at->format('d/m/Y'),
            'updated_at' => $this->updated_at->format('d/m/Y'),
            'deleted_at' => $this->deleted_at,
        ];
    }
}

