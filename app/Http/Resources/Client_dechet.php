<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class Client_dechet extends JsonResource
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
            'id_client_dechet' => $this->id_client_dechet,
            'nom' => $this->nom,
            'prenom' => $this->prenom,
            'CIN' => $this->CIN,
            'photo' => $this->photo,
            'adresse' => $this->adresse,
            'numero_telephone' => $this->numero_telephone,
            'email' => $this->email,
            'type_dechet_achete' => $this->type_dechet_achete,
            'quantite_total_achete' => $this->quantite_total_achete,
            'mot_de_passe' => $this->mot_de_passe,
            'created_at' => $this->created_at->format('d/m/Y'),
            'updated_at' => $this->updated_at->format('d/m/Y'),
            'deleted_at' => $this->deleted_at,

        ];
    }
}
