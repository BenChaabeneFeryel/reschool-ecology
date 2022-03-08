<?php

namespace App\Http\Controllers\API;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use App\Http\Controllers\API\BaseController as BaseController;
use App\Http\Resources\Bloc_poubelle as Bloc_poubelleResource;
use App\Models\Bloc_poubelle;

class Bloc_poubelleController extends BaseController
{

    public function index()
    {
        $bloc_poubelle = Bloc_poubelle::all();
        return $this->handleResponse(Bloc_poubelleResource::collection($bloc_poubelle), 'Affichage des blocs poubelle!');
    }

    public function store(Request $request)
    {
        $input = $request->all();
        $validator = Validator::make($input, [
            'id_etablissement' => 'required',
            'emplacement' => 'required',
        ]);
        if($validator->fails()){
            return $this->handleError($validator->errors());
        }
        $bloc_poubelle = Bloc_poubelle::create($input);
        $bloc_poubelle->save();
        return $this->handleResponse(new Bloc_poubelleResource($bloc_poubelle), 'Block poubelle crée!');
    }


    public function show($id)
    {
        $bloc_poubelle = Bloc_poubelle::find($id);
        if (is_null($bloc_poubelle)) {
            return $this->handleError('bloc poubelle not found!');
        }
        return $this->handleResponse(new Bloc_poubelleResource($bloc_poubelle), 'bloc poubelle existante.');
    }
    public function update(Request $request, Bloc_poubelle $bloc_poubelle)
    {
        $input = $request->all();

        $validator = Validator::make($input, [
            'id_etablissement' => 'required',
            'emplacement' => 'required',
       ]);

        if($validator->fails()){
            return $this->handleError($validator->errors());
        }

        $bloc_poubelle->id_etablissement = $input['id_etablissement'];
        $bloc_poubelle->emplacement = $input['emplacement'];
        $bloc_poubelle->save();

        return $this->handleResponse(new Bloc_poubelleResource($bloc_poubelle), 'bloc poubelle modifié!');
    }


    public function destroy(Bloc_poubelle $bloc_poubelle)
    {
        $bloc_poubelle->delete();
        return $this->handleResponse(new Bloc_poubelleResource($bloc_poubelle), 'bloc poubelle supprimé!');
    }

    public function searchEtab($id_etablissement)
    {
        return Bloc_poubelle::where('id_etablissement', 'like', '%'.$id_etablissement.'%')->get();
    }

}
