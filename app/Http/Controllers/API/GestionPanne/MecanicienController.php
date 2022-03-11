<?php
namespace App\Http\Controllers\API\GestionPanne;

use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use App\Http\Controllers\BaseController as BaseController;
use App\Http\Resources\Mecanicien as MecanicienResource;
use App\Models\Mecanicien;

class MecanicienController extends BaseController
{
    public function index()
    {
        $mecanicien = Mecanicien::all();
        return $this->handleResponse(MecanicienResource::collection($mecanicien), 'affichage de tous les mecaniciens');
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
        $mecanicien = Mecanicien::create($input);
        $mecanicien->save();
        return $this->handleResponse(new MecanicienResource($mecanicien), 'Mecanicien crée!');
    }

    public function show($id)
    {
        $mecanicien = Mecanicien::find($id);
        if (is_null($mecanicien)) {
            return $this->handleError('Mecanicien not found!');
        }
        return $this->handleResponse(new MecanicienResource($mecanicien), 'Mecanicien existe.');
    }
    public function update(Request $request, Mecanicien $mecanicien)
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

        $mecanicien->nom = $input['nom'];
        $mecanicien->prenom = $input['prenom'];
        $mecanicien->CIN = $input['CIN'];
        $mecanicien->photo = $input['photo'];
        $mecanicien->numero_telephone = $input['numero_telephone'];
        $mecanicien->email = $input['email'];
        $mecanicien->adresse = $input['adresse'];
        $mecanicien->mot_de_passe = $input['mot_de_passe'];

        $mecanicien->save();

        return $this->handleResponse(new MecanicienResource($mecanicien), 'Mecanicien modifié!');
    }

    public function destroy(Mecanicien $mecanicien)
    {
        $mecanicien->delete();
        return $this->handleResponse(new MecanicienResource($mecanicien), 'Mecanicien supprimé!');
    }
}
