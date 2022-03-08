<?php

namespace App\Http\Requests;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Contracts\Validation\Validator;
class GestionnaireRequest extends FormRequest{
    public function authorize()
    {
        return true;
    }
    public function rules()  {
        return [
            'nom' => 'required|string|regex:/^[A-Za-z]*$/i',
            'prenom' => 'required|string|regex:/^[A-Za-z]*$/i',
            'CIN' => 'required|numeric',
            'numero_telephone'=> 'required|integer',
            'email' => 'required|email|max:50',
            'mot_de_passe' => 'required|string|min:6',
            'photo' => 'sometimes|nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048'
        ];

    }
    public function failedValidation(Validator $validator){
        throw new HttpResponseException(response()->json([
                'success'   => false,
                'message'   => 'Validation errors',
                'data'      => $validator->errors()
            ]));
    }

    public function messages() //OPTIONAL
    {
        return [
            'nom.required' => 'le nom doit etre obligatoire',
            'prenom.required' => 'le prenom doit etre obligatoire',
            'CIN.required' => 'le CIN doit etre obligatoire',
            'numero_telephone.required' => 'le prenom doit etre obligatoire',
            'email.required' => 'le prenom doit etre obligatoire',
            'mot_de_passe.required' => 'le prenom doit etre obligatoire',


            'photo.mimes' => 'le photo doit etre de type jpeg,png,jpg,gif,svg',
            'photo.image' => 'le photo doit etre un image',
            'photo.max' => 'le photo doit de taille inf à 2048 kilobytes',

            'nom.regex' => 'le  nom doit etre minscule or majuscule',
            'prennom.regex' => 'le prenom doit etre minscule or majuscule',
        ];
    }
}
