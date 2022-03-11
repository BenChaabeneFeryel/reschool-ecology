<?php

namespace App\Http\Requests\TransportDechet;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Contracts\Validation\Validator;
class CamionRequest extends FormRequest{
    public function authorize()
    {
        return true;
    }
    public function rules(){
        if ($this->isMethod('post')) {
            return [
                'id_zone_travail' => 'required',
                'matricule'=> 'required',
                'qrcode' => 'required|string',
                'heure_sortie' => 'date_format:"H:i"',
                'heure_entree' => 'date_format:"H:i"',
                'longitude' => 'string',
                'latitude' => 'string',
                'volume_maximale_poubelle' => 'required|between:0,99999999999',
                'volume_actuelle_plastique' =>'required|between:0,99999999999',
                'volume_actuelle_papier' => 'required|between:0,99999999999',
                'volume_actuelle_composte' =>'required|between:0,99999999999',
                'volume_actuelle_canette' => 'required|between:0,99999999999',
                'volume_carburant_consomme' =>'required|between:0,99999999999',
                'Kilometrage' =>'required|between:0,99999999999',
            ];
        }else if($this->isMethod('PUT')){
            return [
            //     'id_zone_travail' => 'required',
            //     'matricule'=> 'required',
            //     'qrcode' => 'string',
            //     'heure_sortie' => 'date_format:"H:i"',
            //     'heure_entree' => 'date_format:"H:i"',
            //     'longitude' => 'string',
            //     'latitude' => 'string',
            //     'volume_maximale_poubelle' => 'required|between:0,99999999999',
            //     'volume_actuelle_plastique' =>'required|between:0,99999999999',
            //     'volume_actuelle_papier' => 'required|between:0,99999999999',
            //     'volume_actuelle_composte' =>'required|between:0,99999999999',
            //     'volume_actuelle_canette' => 'required|between:0,99999999999',
            //     'volume_carburant_consomme' =>'required|between:0,99999999999',
            //     'Kilometrage' =>'required|between:0,99999999999',
           ];
        }

    }
    public function failedValidation(Validator $validator){
        throw new HttpResponseException(response()->json([
                'success'   => false,
                'message'   => 'Validation errors',
                'data'      => $validator->errors()
            ]));
    }
}
