<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class Commande extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        //return parent::toArray($request);
        return [
            'id' => $this->id,
            'id_client' => $this->id_client,
            'quantite' => $this->quantite,
            'prix' => $this->prix,
            'date_commande' => $this->date_commande,
            'date_livraison' => $this->date_livraison,
            'created_at' => $this->created_at->format('d/m/Y'),
            'updated_at' => $this->updated_at->format('d/m/Y'),
            'deleted_at' => $this->deleted_at,
        ];
    }
}

