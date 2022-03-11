<?php
namespace App\Http\Controllers\API\GestionPoubelleEtablissements;

use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use App\Http\Controllers\BaseController as BaseController;
use App\Http\Resources\Zone_travail as Zone_travailResource;

use App\Models\Zone_travail;

class Zone_travailController extends BaseController
{
    public function index()
    {
        $zone_travail = Zone_travail::all();
        return $this->handleResponse(Zone_travailResource::collection($zone_travail), 'affichage de tous les zone travail!');
    }

    public function store(Request $request)
    {
        $input = $request->all();
        $validator = Validator::make($input, [
            'region' => 'required',
            'quantite_total_collecte_plastique' => 'required',
            'quantite_total_collecte_composte' => 'required',
            'quantite_total_collecte_papier' => 'required',
            'quantite_total_collecte_canette' => 'required'
        ]);
        if($validator->fails()){
            return $this->handleError($validator->errors());
        }
        $zone_travail = Zone_travail::create($input);
        $zone_travail->save();
        return $this->handleResponse(new Zone_travailResource($zone_travail), 'zone travail crée!');
    }


    public function show($id)
    {
        $zone_travail = Zone_travail::find($id);
        if (is_null($zone_travail)) {
            return $this->handleError('zone travail not found!');
        }
        return $this->handleResponse(new Zone_travailResource($zone_travail), 'zone travail existe.');
    }

    public function update(Request $request, Zone_travail $zone_travail)
    {
        $input = $request->all();

        $validator = Validator::make($input, [
            'region' => 'required',
            'quantite_total_collecte_plastique' => 'required',
            'quantite_total_collecte_composte' => 'required',
            'quantite_total_collecte_papier' => 'required',
            'quantite_total_collecte_canette' => 'required'
        ]);

        if($validator->fails()){
            return $this->handleError($validator->errors());
        }

        $zone_travail->region = $input['region'];
        $zone_travail->quantite_total_collecte_plastique = $input['quantite_total_collecte_plastique'];
        $zone_travail->quantite_total_collecte_composte = $input['quantite_total_collecte_composte'];
        $zone_travail->quantite_total_collecte_papier = $input['quantite_total_collecte_papier'];
        $zone_travail->quantite_total_collecte_canette = $input['quantite_total_collecte_canette'];
        $zone_travail->save();

        return $this->handleResponse(new Zone_travailResource($zone_travail), 'zone travail modifié avec succés');
    }


    public function destroy(Zone_travail $zone_travail)
    {
        $zone_travail->delete();
        return $this->handleResponse(new Zone_travailResource($zone_travail), 'Zone travail supprimé!');
    }


    public function searchRegion($region)
    {
        return Zone_travail::where('region', 'like', '%'.$region.'%')->get();
    }

}
