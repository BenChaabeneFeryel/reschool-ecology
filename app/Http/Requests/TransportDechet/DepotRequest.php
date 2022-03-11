<?php

namespace App\Http\Requests\TransportDechet;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Contracts\Validation\Validator;
class DepotRequest extends FormRequest{
    public function authorize()
    {
        return true;
    }
    public function rules(){
        if ($this->isMethod('post')) {
            return [
                'id_zone_depot' =>'required',
                'id_dechet' =>'required',
                'id_camion' =>'required',
                'date_depot' => 'date_format:Y-m-d',
                'quantite_depose' => 'required|between:0,99999999999',
                'prix_total' => 'required|between:0,99999999999',
            ];
        }else if($this->isMethod('PUT')){
            return [
            //     'id_zone_depot' =>'required',
            //     'id_dechet' =>'required',
            //     'id_camion' =>'required',
            //     'date_depot' => 'date_format:Y-m-d',
            //     'quantite_depose' => 'required|between:0,99999999999',
            //     'prix_total' => 'required|between:0,99999999999',
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
