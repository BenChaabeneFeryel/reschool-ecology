<?php

namespace App\Http\Requests\GestionPoubelleEtablissements;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Contracts\Validation\Validator;
class EtablissementRequest extends FormRequest{
    public function authorize()
    {
        return true;
    }
    public function rules()  {
        if ($this->isMethod('post')) {
            return [
                'id_zone_travail' => 'required',
                'id_responsable_etablissement' => 'required',
                'nom_etablissement' => 'required|sring',
                'nbr_personnes',
                'adresse' => 'required|string',
                'longitude' => 'required|between:-99999999.99,99999999.99',
                'latitude' => 'required|between:-99999999.99,99999999.99',
                'quantite_dechets_plastique' => 'required|between:0,99999999.99',
                'quantite_dechets_composte'=> 'required|between:0,99999999.99',
                'quantite_dechets_papier'=> 'required|between:0,99999999.99',
                'quantite_dechets_canette'=> 'required|between:0,99999999.99',

            ];
        }else if($this->isMethod('PUT')){
            return [
            //     'id_zone_travail' => 'required',
            //     'id_responsable_etablissement' => 'required',
            //     'nom_etablissement' => 'required|sring',
            //     'nbr_personnes',
            //     'adresse' => 'required|string',
            //     'longitude' => 'required|between:-99999999.99,99999999.99',
            //     'latitude' => 'required|between:-99999999.99,99999999.99',
            //     'quantite_dechets_plastique' => 'required|between:0,99999999.99',
            //     'quantite_dechets_composte'=> 'required|between:0,99999999.99',
            //     'quantite_dechets_papier'=> 'required|between:0,99999999.99',
            //     'quantite_dechets_canette'=> 'required|between:0,99999999.99',

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
