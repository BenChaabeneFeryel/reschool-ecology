<?php
namespace App\Http\Controllers\API\TransportDechet;

use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use App\Http\Controllers\BaseController as BaseController;
use App\Http\Resources\Depot as DepotResource;
use App\Models\Depot;

class DepotController extends BaseController
{
    public function index()
    {
        $depot = Depot::all();
        return $this->handleResponse(DepotResource::collection($depot), 'Depot have been retrieved!');
    }

    public function store(Request $request)
    {
        $input = $request->all();
        $validator = Validator::make($input, [
            'id_zone_depot'=> 'required',
            'id_dechet'=> 'required',
            'id_camion'=> 'required',
            'date_depot'=> 'required',
            'quantite_depose'=> 'required',
            'prix_total'=> 'required',
        ]);
        if($validator->fails()){
            return $this->handleError($validator->errors());
        }
        $depot = Depot::create($input);
        $depot->save();
        return $this->handleResponse(new DepotResource($depot), 'depot crée!');
    }

    public function show($id)
    {
        $depot = Depot::find($id);
        if (is_null($depot)) {
            return $this->handleError('depot not found!');
        }
        return $this->handleResponse(new DepotResource($depot), 'depot retrieved.');
    }

    public function update(Request $request, Depot $depot)
    {
        $input = $request->all();

        $validator = Validator::make($input, [
            'id_zone_depot'=> 'required',
            'id_dechet'=> 'required',
            'id_camion'=> 'required',
            'date_depot'=> 'required',
            'quantite_depose'=> 'required',
            'prix_total'=> 'required',
        ]);

        if($validator->fails()){
            return $this->handleError($validator->errors());
        }

        $depot->id_zone_depot = $input['id_zone_depot'];
        $depot->id_dechet = $input['id_dechet'];
        $depot->id_camion = $input['id_camion'];
        $depot->date_depot = $input['date_depot'];
        $depot->quantite_depose = $input['quantite_depose'];
        $depot->prix_total = $input['prix_total'];

        $depot->save();

        return $this->handleResponse(new DepotResource($depot), 'depot successfully updated!');
    }

    public function destroy(Depot $depot)
    {
        $depot->delete();
        return $this->handleResponse(new DepotResource($depot), 'depot deleted!');
    }

}
