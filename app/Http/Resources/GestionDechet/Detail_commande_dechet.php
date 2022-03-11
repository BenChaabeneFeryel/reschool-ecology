<?php

namespace App\Http\Resources\GestionDechet;

use Illuminate\Http\Resources\Json\JsonResource;

class Detail_commande_dechet extends JsonResource{
    public function toArray($request)
    {
        return [
            'id' => $this->id,

            'id_commande_dechet' => $this->id_commande_dechet,
            'id_dechet' => $this->id_dechet,
            'quantite' => $this->quantite,

            'created_at' => $this->created_at->format('d/m/Y'),
            'updated_at' => $this->updated_at->format('d/m/Y'),
            'deleted_at' => $this->deleted_at,

        ];
    }
}
