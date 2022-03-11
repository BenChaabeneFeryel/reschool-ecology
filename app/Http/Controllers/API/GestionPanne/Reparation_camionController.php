<?php
namespace App\Http\Controllers\API\GestionPanne;

use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use App\Http\Controllers\BaseController as BaseController;
use App\Http\Resources\Reparation_camion as Reparation_camionResource;
use App\Models\Reparation_camion;

class Reparation_camionController extends BaseController
{
    public function index()
    {
        $reparation_camion = Reparation_camion::all();
        return $this->handleResponse(Reparation_camionResource::collection($reparation_camion), ' Reparation camion have been retrieved!');
    }
    public function store(Request $request)
    {
        $input = $request->all();
        $validator = Validator::make($input, [
            'id_camion' => 'required',
            'id_mecanicien' => 'required',
            'description_panne' => 'required',
            'cout' => 'required',
            'date_debut_reparation' => 'required',
            'date_fin_reparation' => 'required',
        ]);
        if($validator->fails()){
            return $this->handleError($validator->errors());
        }
        $reparation_camion = Reparation_camion::create($input);
        $reparation_camion->save();
        return $this->handleResponse(new Reparation_camionResource($reparation_camion), ' Reparation camion crée!');
    }

    public function show($id)
    {
        $reparation_camion = Reparation_camion::find($id);
        if (is_null($reparation_camion)) {
            return $this->handleError(' Reparation camion not found!');
        }
        return $this->handleResponse(new Reparation_camionResource($reparation_camion), ' Reparation camion retrieved.');
    }


    public function update(Request $request, Reparation_camion $reparation_camion)
    {
   $input = $request->all();

        $validator = Validator::make($input, [
            'id_camion' => 'required',
            'id_mecanicien' => 'required',
            'description_panne' => 'required',
            'cout' => 'required',
            'date_debut_reparation' => 'required',
            'date_fin_reparation' => 'required',
        ]);

        if($validator->fails()){
            return $this->handleError($validator->errors());
        }

        $reparation_camion->id_camion = $input['id_camion'];
        $reparation_camion->id_mecanicien = $input['id_mecanicien'];
        $reparation_camion->description_panne = $input['description_panne'];
        $reparation_camion->cout = $input['cout'];
        $reparation_camion->date_debut_reparation = $input['date_debut_reparation'];
        $reparation_camion->date_fin_reparation = $input['date_fin_reparation'];

        $reparation_camion->save();

        return $this->handleResponse(new Reparation_camionResource($reparation_camion), ' Reparation camion successfully updated!');
    }
    public function destroy(Reparation_camion $reparation_camion)
    {
        $reparation_camion->delete();
        return $this->handleResponse(new Reparation_camionResource($reparation_camion), ' Reparation camion deleted!');
    }
}
