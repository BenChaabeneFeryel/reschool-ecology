<?php
namespace App\Http\Controllers\API;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use App\Http\Controllers\API\BaseController as BaseController;
use App\Http\Resources\Poubelle as PoubelleResource;
use App\Models\Poubelle;

class PoubelleController extends BaseController
{

    public function index()
    {
        $poubelle = Poubelle::all();
        return $this->handleResponse(PoubelleResource::collection($poubelle), 'poubelle have been retrieved!');
    }

    public function store(Request $request)
    {
        $input = $request->all();
        $validator = Validator::make($input, [
            'id_bloc_poubelle' => 'required',
            'nom' => 'required|string|regex:/^[A-Za-z]*$/i',
            'capacite_poubelle' => 'required',
            'type' => 'required',
            'Etat' => 'required',
            'temps_remplissage' => 'required',
        ]);
        if($validator->fails()){
            return $this->handleError($validator->errors());
        }
        $poubelle = Poubelle::create($input);
        $poubelle->save();
        return $this->handleResponse(new PoubelleResource($poubelle), ' poubelle crée!');
    }

    public function show($id)
    {
        $poubelle = Poubelle::find($id);
        if (is_null($poubelle)) {
            return $this->handleError('poubelle not found!');
        }
        return $this->handleResponse(new PoubelleResource($poubelle), ' poubelle retrieved.');
    }
    public function update(Request $request, Poubelle $poubelle)
    {
        $input = $request->all();

        $validator = Validator::make($input, [
            'id_bloc_poubelle' => 'required',
            'nom' => 'required|string|regex:/^[A-Za-z]*$/i',
            'capacite_poubelle' => 'required',
            'type' => 'required',
            'Etat' => 'required',
            'temps_remplissage' => 'required',
        ]);

        if($validator->fails()){
            return $this->handleError($validator->errors());
        }

        $poubelle->id_bloc_poubelle = $input['id_bloc_poubelle'];
        $poubelle->nom = $input['nom'];
        $poubelle->capacite_poubelle = $input['capacite_poubelle'];
        $poubelle->type = $input['type'];
        $poubelle->Etat = $input['Etat'];
        $poubelle->temps_remplissage = $input['temps_remplissage'];

        $poubelle->save();

        return $this->handleResponse(new PoubelleResource($poubelle), ' poubelle successfully updated!');
    }


    public function destroy(Poubelle $poubelle)
    {
        $poubelle->delete();
        return $this->handleResponse(new PoubelleResource($poubelle), ' poubelle deleted!');
    }

    public function searchBlocPoubelle($id_bloc_poubelle)
    {
        return Poubelle::where('id_bloc_poubelle', 'like', '%'.$id_bloc_poubelle.'%')->get();
    }

    public function searchEType($type)
    {
        return Poubelle::where('type', 'like', '%'.$type.'%')->get();
    }
}
