<?php
namespace App\Http\Controllers\API\TransportDechet;

use Illuminate\Support\Facades\Validator;
use App\Http\Controllers\BaseController as BaseController;
use App\Http\Resources\Camion as CamionResource;
use App\Models\Camion;
use Illuminate\Http\Request;

class CamionController extends BaseController
{
    public function index()
    {
        $camion = Camion::all();
        return $this->handleResponse(CamionResource::collection($camion), 'affichagde des camions!');
    }
    public function store(Request $request)
    {
        $input = $request->all();
        $validator = Validator::make($input, [
            'id_zone_travail' => 'required',
            'matricule' => 'required',
            'heure_sortie' => 'required',
            'heure_entree' => 'required',
            'longitude' => 'required',
            'latitude' => 'required',
            'volume_maximale_poubelle'=>'required',
            'volume_actuelle_plastique'=>'required',
            'volume_actuelle_papier'=>'required',
            'volume_actuelle_composte'=>'required',
            'volume_actuelle_canette'=>'required',
            'volume_carburant_consomme' => 'required',
            'Kilometrage' => 'required',
        ]);
        if($validator->fails()){
            return $this->handleError($validator->errors());
        }
        $camion = Camion::create($input);
        $camion->save();
        return $this->handleResponse(new CamionResource($camion), ' Camion crée!');
    }

    public function show($id)
    {
        $camion = Camion::find($id);
        if (is_null($camion)) {
            return $this->handleError('poubelle not found!');
        }
        return $this->handleResponse(new CamionResource($camion), ' Camion existante.');
    }

    public function update(Request $request, Camion $camion)
    {
        $input = $request->all();

        $validator = Validator::make($input, [
            'id_zone_travail' => 'required',
            'matricule' => 'required',
            'heure_sortie' => 'required',
            'heure_entree' => 'required',
            'longitude' => 'required',
            'latitude' => 'required',
            'volume_maximale_poubelle'=>'required',
            'volume_actuelle_plastique'=>'required',
            'volume_actuelle_papier'=>'required',
            'volume_actuelle_composte'=>'required',
            'volume_actuelle_canette'=>'required',
            'volume_carburant_consomme' => 'required',
            'Kilometrage' => 'required',
        ]);

        if($validator->fails()){
            return $this->handleError($validator->errors());
        }

        $camion->id_zone_travail = $input['id_zone_travail'];
        $camion->matricule = $input['matricule'];
        $camion->heure_sortie = $input['heure_sortie'];
        $camion->heure_entree = $input['heure_entree'];
        $camion->longitude = $input['longitude'];
        $camion->latitude = $input['latitude'];
        $camion->volume_maximale_poubelle = $input['volume_maximale_poubelle'];
        $camion->volume_actuelle_plastique = $input['volume_actuelle_plastique'];
        $camion->volume_actuelle_papier = $input['volume_actuelle_papier'];
        $camion->volume_actuelle_composte = $input['volume_actuelle_composte'];
        $camion->volume_actuelle_canette = $input['volume_actuelle_canette'];
        $camion->volume_carburant_consomme = $input['volume_carburant_consomme'];
        $camion->Kilometrage = $input['Kilometrage'];
        $camion->save();

        return $this->handleResponse(new CamionResource($camion), ' Camion modifié!');
    }

    public function destroy(Camion $camion)
    {
        $camion->delete();
        return $this->handleResponse(new CamionResource($camion), ' Camion supprimé!');
    }

    public function searchMatricule($matricule)
    {
        return Camion::where('matricule', 'like', '%'.$matricule.'%')->get();
    }
}
