<?php
namespace App\Http\Controllers\API\TransportDechet;

use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use App\Http\Controllers\BaseController as BaseController;
use App\Http\Resources\Zone_depot as Zone_depotResource;
use App\Models\Zone_depot;

class Zone_depotController extends BaseController
{
    public function index()
    {
        $zone_depot = Zone_depot::all();
        return $this->handleResponse(Zone_depotResource::collection($zone_depot), 'Affichage des zones de depots!');
    }

    public function store(Request $request)
    {
        $input = $request->all();
        $validator = Validator::make($input, [
            'adresse' => 'required',
            'longitude' => 'required',
            'latitude' => 'required',
            'quantite_depot_maximale' => 'required',
            'quantite_depot_actuelle' => 'required'
        ]);
        if($validator->fails()){
            return $this->handleError($validator->errors());
        }
        $zone_depot = Zone_depot::create($input);
        $zone_depot->save();
        return $this->handleResponse(new Zone_depotResource($zone_depot), 'Zone depot crée!');
    }

    public function show($id)
    {
        $zone_depot = Zone_depot::find($id);
        if (is_null($zone_depot)) {
            return $this->handleError('zone depot not found!');
        }
        return $this->handleResponse(new Zone_depotResource($zone_depot), 'Zone depot existe.');
    }


    public function update(Request $request, Zone_depot $zone_depot)
    {
        $input = $request->all();

        $validator = Validator::make($input, [
            'adresse' => 'required',
            'longitude' => 'required',
            'latitude' => 'required',
            'quantite_depot_maximale' => 'required',
            'quantite_depot_actuelle' => 'required'
        ]);

        if($validator->fails()){
            return $this->handleError($validator->errors());
        }
        $zone_depot->adresse = $input['adresse'];
        $zone_depot->longitude = $input['longitude'];
        $zone_depot->latitude = $input['latitude'];
        $zone_depot->quantite_depot_maximale = $input['quantite_depot_maximale'];
        $zone_depot->quantite_depot_actuelle = $input['quantite_depot_actuelle'];
        $zone_depot->save();

        return $this->handleResponse(new Zone_depotResource($zone_depot), 'Zone depot modifié!');
    }

    public function destroy(Zone_depot $zone_depot)
    {
        $zone_depot->delete();
        return $this->handleResponse(new Zone_depotResource($zone_depot), 'Zone depot supprimé!');
    }

}
