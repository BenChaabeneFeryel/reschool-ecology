<?php
namespace App\Http\Controllers\API\GestionCompte;

use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use App\Http\Controllers\BaseController as BaseController;
use App\Http\Resources\GestionCompte\Ouvrier as OuvrierResource;
use App\Models\Ouvrier;

class OuvrierController extends BaseController
{
    public function index()
    {
        $ouvrier = Ouvrier::all();
        return $this->handleResponse(OuvrierResource::collection($ouvrier), 'Ouvrier have been retrieved!');
    }

    public function store(Request $request)
    {
        $input = $request->all();
        $validator = Validator::make($input, [
            'id_etablissement' => 'required',
            'id_camion' => 'required',
            'poste' => 'required',
            'nom' => 'required|string|regex:/^[A-Za-z]*$/i',
            'prenom' => 'required|string|regex:/^[A-Za-z]*$/i',
            'numero_tel' => 'required',
            'email' => 'required',
            'mot_de_passe' => 'required',
        ]);
        if($validator->fails()){
            return $this->handleError($validator->errors());
        }
        $ouvrier = Ouvrier::create($input);
        $ouvrier->save();
        return $this->handleResponse(new OuvrierResource($ouvrier), 'Ouvrier crée!');
    }


    public function show($id)
    {
        $ouvrier = Ouvrier::find($id);
        if (is_null($ouvrier)) {
            return $this->handleError('ouvrier not found!');
        }
        return $this->handleResponse(new OuvrierResource($ouvrier), 'Ouvrier retrieved.');
    }

    public function update(Request $request, Ouvrier $ouvrier)
    {
        $input = $request->all();

        $validator = Validator::make($input, [
            'id_etablissement' => 'required',
            'id_camion' => 'required',
            'poste' => 'required',
            'nom' => 'required|string|regex:/^[A-Za-z]*$/i',
            'prenom' => 'required|string|regex:/^[A-Za-z]*$/i',
            'numero_tel' => 'required',
            'email' => 'required',
            'mot_de_passe' => 'required',
        ]);

        if($validator->fails()){
            return $this->handleError($validator->errors());
        }
        $ouvrier->id_etablissement = $input['id_etablissement'];
        $ouvrier->id_camion = $input['id_camion'];
        $ouvrier->poste = $input['poste'];
        $ouvrier->nom = $input['nom'];
        $ouvrier->prenom = $input['prenom'];
        $ouvrier->numero_tel = $input['numero_tel'];
        $ouvrier->email = $input['email'];
        $ouvrier->mot_de_passe = $input['mot_de_passe'];
        $ouvrier->save();

        return $this->handleResponse(new OuvrierResource($ouvrier), 'Ouvrier successfully updated!');
    }

    public function destroy(Ouvrier $ouvrier)
    {
        $ouvrier->delete();
        return $this->handleResponse(new OuvrierResource($ouvrier), 'Ouvrier deleted!');
    }

}
