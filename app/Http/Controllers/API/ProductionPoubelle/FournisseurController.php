<?php
namespace App\Http\Controllers\API\ProductionPoubelle;

use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use App\Http\Controllers\BaseController as BaseController;
use App\Http\Resources\Fournisseur as FournisseurResource;
use App\Models\Fournisseur;

class FournisseurController extends BaseController
{
    public function index()
    {
        $fournisseur = Fournisseur::all();
        return $this->handleResponse(FournisseurResource::collection($fournisseur), 'Affichage des fournisseurs');
    }

    public function store(Request $request)
    {
        $input = $request->all();
        $validator = Validator::make($input, [
            'nom' => 'required|string|regex:/^[A-Za-z]*$/i',
            'prenom' => 'required|string|regex:/^[A-Za-z]*$/i',
            'CIN'=>'required|numeric',
            'photo'=> 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'numero_telephone'=>'required',
            'email'=> 'required|email',
            'adresse'=>'required',
        ]);
        if($validator->fails()){
            return $this->handleError($validator->errors());
        }
        $fournisseur = Fournisseur::create($input);
        $fournisseur->save();
        return $this->handleResponse(new FournisseurResource($fournisseur), 'fournisseur crée!');
    }

    public function show($id)
    {
        $fournisseur = Fournisseur::find($id);
        if (is_null($fournisseur)) {
            return $this->handleError('fournisseur not found!');
        }
        return $this->handleResponse(new FournisseurResource($fournisseur), 'fournisseur existe.');
    }

    public function update(Request $request, Fournisseur $fournisseur)
    {
        $input = $request->all();

        $validator = Validator::make($input, [
            'nom' => 'required|string|regex:/^[A-Za-z]*$/i',
            'prenom' => 'required|string|regex:/^[A-Za-z]*$/i',
            'CIN'=>'required|numeric',
            'photo'=> 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'numero_telephone'=>'required',
            'email'=> 'required|email',
            'adresse'=>'required|string',
        ]);

        if($validator->fails()){
            return $this->handleError($validator->errors());
        }
        $fournisseur->nom = $input['nom'];
        $fournisseur->prenom = $input['prenom'];
        $fournisseur->CIN = $input['CIN'];
        $fournisseur->photo = $input['photo'];
        $fournisseur->numero_telephone = $input['numero_telephone'];
        $fournisseur->email = $input['email'];
        $fournisseur->adresse = $input['adresse'];

        $fournisseur->save();

        return $this->handleResponse(new FournisseurResource($fournisseur), ' fournisseur modifié!');
    }

    public function destroy(Fournisseur $fournisseur)
    {
        $fournisseur->delete();
        return $this->handleResponse(new FournisseurResource($fournisseur), ' fournisseur supprimé!');
    }
}
