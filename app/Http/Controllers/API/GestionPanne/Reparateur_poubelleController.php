<?php

namespace App\Http\Controllers\API;

use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use App\Http\Controllers\API\BaseController as BaseController;
use App\Http\Resources\Reparateur_poubelle as Reparateur_poubelleResource;
use App\Models\Reparateur_poubelle;


class Reparateur_poubelleController extends BaseController
{
    public function index()
    {
        $reparateur_poubelle = Reparateur_poubelle::all();
        return $this->handleResponse(Reparateur_poubelleResource::collection($reparateur_poubelle), 'affichage des reparateurs poubelles');
    }

    public function store(Request $request)
    {
        $input = $request->all();
        $validator = Validator::make($input, [
            'nom' => 'required|string|regex:/^[A-Za-z]*$/i',
            'prenom' => 'required|string|regex:/^[A-Za-z]*$/i',
            'CIN' => 'required',
            'photo'=> 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'numero_telephone' => 'required',
            'email' => 'required',
            'adresse' => 'required',
            'mot_de_passe' => 'required',
        ]);
        if($validator->fails()){
            return $this->handleError($validator->errors());
        }
        $reparateur_poubelle = Reparateur_poubelle::create($input);
        $reparateur_poubelle->save();
        return $this->handleResponse(new Reparateur_poubelleResource($reparateur_poubelle), 'reparateur poubelle crée!');
    }

    public function show($id)
    {
        $reparateur_poubelle = Reparateur_poubelle::find($id);
        if (is_null($reparateur_poubelle)) {
            return $this->handleError('reparateur poubelle not found!');
        }
        return $this->handleResponse(new Reparateur_poubelleResource($reparateur_poubelle), 'reparateur poubelle existe.');

    }
    public function update(Request $request, Reparateur_poubelle $reparateur_poubelle)
    {
        $input = $request->all();

        $validator = Validator::make($input, [
            'nom' => 'required|string|regex:/^[A-Za-z]*$/i',
            'prenom' => 'required|string|regex:/^[A-Za-z]*$/i',
            'CIN' => 'required',
            'photo'=> 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'numero_telephone' => 'required',
            'email' => 'required',
            'adresse' => 'required',
            'mot_de_passe' => 'required',
        ]);

        if($validator->fails()){
            return $this->handleError($validator->errors());
        }

        $reparateur_poubelle->nom = $input['nom'];
        $reparateur_poubelle->prenom = $input['prenom'];
        $reparateur_poubelle->CIN = $input['CIN'];
        $reparateur_poubelle->photo = $input['photo'];
        $reparateur_poubelle->numero_telephone = $input['numero_telephone'];
        $reparateur_poubelle->email = $input['email'];
        $reparateur_poubelle->adresse = $input['adresse'];
        $reparateur_poubelle->mot_de_passe = $input['mot_de_passe'];

        $reparateur_poubelle->save();

        return $this->handleResponse(new Reparateur_poubelleResource($reparateur_poubelle), 'reparateur poubelle modifié');
    }

    public function destroy(Reparateur_poubelle $reparateur_poubelle)
    {
        $reparateur_poubelle->delete();
        return $this->handleResponse(new Reparateur_poubelleResource($reparateur_poubelle), 'reparateur poubelle supprimé!');
    }
    public function serachAdresse($adresse)
    {
        return Reparateur_poubelle::where('adresse', 'like', '%'.$adresse.'%')->get();
    }

}
