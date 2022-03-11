<?php

namespace App\Http\Resources\GestionDechet;

use Illuminate\Http\Resources\Json\JsonResource;

class Commande_dechet extends JsonResource{
    public function toArray($request){
        return [
            'id' => $this->id,

            'id_client_dechet' => $this->id_client_dechet,
            'quantite' => $this->quantite,
            'montant_total' => $this->montant_total,
            'date_commande' => $this->date_commande,
            'date_livraison' => $this->date_livraison,

            'created_at' => $this->created_at->format('d/m/Y'),
            'updated_at' => $this->updated_at->format('d/m/Y'),
            'deleted_at' => $this->deleted_at,
        ];
    }
}

