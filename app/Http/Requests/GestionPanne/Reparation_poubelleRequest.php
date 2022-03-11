<?php

namespace App\Http\Requests\GestionPanne;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Contracts\Validation\Validator;
class Reparation_poubelleRequest extends FormRequest{
    public function authorize()
    {
        return true;
    }
    public function rules()  {
        if ($this->isMethod('post')) {
            return [
                'id_poubelle' => 'required',
                'id_reparateur_poubelle' =>'required',
                'description_panne' =>'required|string',
                'cout' =>'required|between:0,99999999.99',
                'date_debut_reparation'=>'date_format:Y-m-d',
                'date_fin_reparation'=>'date_format:Y-m-d',

            ];
        }else if($this->isMethod('PUT')){
            return [
            //     'id_poubelle' => 'required',
            //     'id_reparateur_poubelle' =>'required',
            //     'description_panne' =>'required|string',
            //     'cout' =>'required|between:0,99999999.99',
            //     'date_debut_reparation'=>'date_format:Y-m-d',
            //     'date_fin_reparation'=>'date_format:Y-m-d',

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
