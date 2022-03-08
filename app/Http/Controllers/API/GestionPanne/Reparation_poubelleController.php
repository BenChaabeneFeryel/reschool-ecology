<?php

namespace App\Http\Controllers\API;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use App\Http\Controllers\API\BaseController as BaseController;
use App\Http\Resources\Reparation_poubelle as Reparation_poubelleResource;
use App\Models\Reparation_poubelle;

class Reparation_poubelleController extends BaseController
{
    public function index()
    {
        $reparation_poubelle = Reparation_poubelle::all();
        return $this->handleResponse(Reparation_poubelleResource::collection($reparation_poubelle), 'Reparation poubelle have been retrieved!');
    }

    public function store(Request $request)
    {
        $input = $request->all();
        $validator = Validator::make($input, [
            'id_poubelle' => 'required',
            'id_reparateur_poubelle' => 'required',
            'description_panne' => 'required',
            'cout' => 'required',
            'date_debut_reparation' => 'required',
            'date_fin_reparation' => 'required',
        ]);
        if($validator->fails()){
            return $this->handleError($validator->errors());
        }
        $reparation_poubelle = Reparation_poubelle::create($input);
        $reparation_poubelle->save();
        return $this->handleResponse(new Reparation_poubelleResource($reparation_poubelle), 'reparation poubelle crée!');
    }

    public function show($id)
    {
        $reparation_poubelle = Reparation_poubelle::find($id);
        if (is_null($reparation_poubelle)) {
            return $this->handleError('reparation poubelle not found!');
        }
        return $this->handleResponse(new Reparation_poubelleResource($reparation_poubelle), 'reparation poubelle retrieved.');
    }

    public function update(Request $request, Reparation_poubelle $reparation_poubelle)
    {
        $input = $request->all();

        $validator = Validator::make($input, [
            'id_poubelle' => 'required',
            'id_reparateur_poubelle' => 'required',
            'description_panne' => 'required',
            'cout' => 'required',
            'date_debut_reparation' => 'required',
            'date_fin_reparation' => 'required',
        ]);

        if($validator->fails()){
            return $this->handleError($validator->errors());
        }

        $reparation_poubelle->id_poubelle = $input['id_poubelle'];
        $reparation_poubelle->id_reparateur_poubelle = $input['id_reparateur_poubelle'];
        $reparation_poubelle->description_panne = $input['description_panne'];
        $reparation_poubelle->cout = $input['cout'];
        $reparation_poubelle->date_debut_reparation = $input['date_debut_reparation'];
        $reparation_poubelle->date_fin_reparation = $input['date_fin_reparation'];

        $reparation_poubelle->save();

        return $this->handleResponse(new Reparation_poubelleResource($reparation_poubelle), 'reparation poubelle successfully updated!');
    }

    public function destroy(Reparation_poubelle $reparation_poubelle)
    {
        $reparation_poubelle->delete();
        return $this->handleResponse(new Reparation_poubelleResource($reparation_poubelle), 'reparation poubelle deleted!');
    }
}
