<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class Reparateur_poubelle extends JsonResource
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
        'nom' => $this->nom,
        'prenom' => $this->prenom,
        'CIN' => $this->CIN,
        'photo' => $this->photo,
        'numero_telephone' => $this->numero_telephone,
        'email' => $this->email,
        'adresse'=> $this->adresse,
        'mot_de_passe' => $this->mot_de_passe,
        'created_at' => $this->created_at->format('d/m/Y'),
        'updated_at' => $this->updated_at->format('d/m/Y'),
        'deleted_at' => $this->deleted_at,
    ];
    }
}
