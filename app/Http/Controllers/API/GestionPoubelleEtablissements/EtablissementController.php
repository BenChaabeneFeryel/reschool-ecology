<?php

namespace App\Http\Controllers\API;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use App\Http\Controllers\API\BaseController as BaseController;
use App\Http\Resources\Etablissement as EtablissementResource;
use App\Models\Etablissement;

class EtablissementController extends BaseController
{
    public function index()
    {
        $etablissement = Etablissement::all();
        return $this->handleResponse(EtablissementResource::collection($etablissement), 'Affichage des établissement');
    }

    public function store(Request $request)
    {
        $input = $request->all();
        $validator = Validator::make($input, [
            'id_zone_travail' => 'required',
            'nom_etablissement'=>'required',
            'nbr_personnes' => 'required',
            'adresse' => 'required',
            'longitude' => 'required',
            'latitude' => 'required',
            'email'=> 'required|email',
            'mot_de_passe' => 'required',
            'numero_telephone' => 'required',
            'quantite_dechets' => 'required',
        ]);
        if($validator->fails()){
            return $this->handleError($validator->errors());
        }
        $etablissement = Etablissement::create($input);
        $etablissement->save();
        return $this->handleResponse(new EtablissementResource($etablissement), 'Etablissement crée!');
    }

    public function show($id)
    {
        $etablissement = Etablissement::find($id);
        if (is_null($etablissement)) {
            return $this->handleError('etablissement not found!');
        }
        return $this->handleResponse(new EtablissementResource($etablissement), 'etablissement existe.');
    }
    public function update(Request $request, Etablissement $etablissement)
    {
        $input = $request->all();

        $validator = Validator::make($input, [
            'id_zone_travail' => 'required',
            'nom_etablissement'=>'required',
            'nbr_personnes' => 'required',
            'adresse' => 'required',
            'longitude' => 'required',
            'latitude' => 'required',
            'email'=> 'required|email',
            'mot_de_passe' => 'required',
            'numero_telephone' => 'required',
            'quantite_dechets' => 'required',
        ]);

        if($validator->fails()){
            return $this->handleError($validator->errors());
        }

        $etablissement->id_zone_travail = $input['id_zone_travail'];
        $etablissement->nom_etablissement = $input['nom_etablissement'];
        $etablissement->nbr_personnes = $input['nbr_personnes'];
        $etablissement->adresse = $input['adresse'];
        $etablissement->longitude = $input['longitude'];
        $etablissement->latitude = $input['latitude'];
        $etablissement->email = $input['email'];
        $etablissement->mot_de_passe = $input['mot_de_passe'];
        $etablissement->numero_telephone = $input['numero_telephone'];
        $etablissement->quantite_dechets = $input['quantite_dechets'];

        $etablissement->save();

        return $this->handleResponse(new EtablissementResource($etablissement), ' etablissement modifié!');
    }

    public function destroy(Etablissement $etablissement)
    {
        $etablissement->delete();
        return $this->handleResponse(new EtablissementResource($etablissement), ' etablissement supprimé!');
    }

    public function searchZone_travail($id_zone_travail)
    {
        return Etablissement::where('id_zone_travail', 'like', '%'.$id_zone_travail.'%')->get();
    }
}
