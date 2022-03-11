<?php
namespace App\Http\Requests\GestionPoubelleEtablissements;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
class Detail_commande_poubelleRequest extends FormRequest{
    public function authorize(){
        return true;
    }
    public function rules()  {
        if ($this->isMethod('post')) {
            return [
                'id_commande_poubelle'=> 'required|numeric',
                'id_stock_poubelle'=> 'required|numeric',
                'quantite'=> 'required|numeric',
                'prix_unitaires'=> 'required|numeric',
            ];
        }else if($this->isMethod('PUT')){
            return [
                // 'id_commande_poubelle'=> 'required|numeric',
                // 'id_stock_poubelle'=> 'required|numeric',
                // 'quantite'=> 'required|numeric',
                // 'prix_unitaires'=> 'required|numeric',
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
