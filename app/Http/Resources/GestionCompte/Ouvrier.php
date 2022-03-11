<?php

namespace App\Http\Resources\GestionCompte;

use Illuminate\Http\Resources\Json\JsonResource;

class Ouvrier extends JsonResource{
    public function toArray($request){
        return [
            'id' => $this->id,

            'id_etablissement'=> $this->id_etablissement,
            'id_camion'=> $this->id_camion,
            'poste'=> $this->poste,
            'qrcode'=> $this->qrcode,
            'nom' => $this->nom,
            'prenom' => $this->prenom,
            'CIN' => $this->CIN,
            'photo' => $this->photo,
            'numero_tel' => $this->numero_tel,
            'email' => $this->email,
            'mot_de_passe' => $this->mot_de_passe,

            'created_at' => $this->created_at->format('d/m/Y'),
            'updated_at' => $this->updated_at->format('d/m/Y'),
            'deleted_at' => $this->deleted_at,
        ];
    }
}
