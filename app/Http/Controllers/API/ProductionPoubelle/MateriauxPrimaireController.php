<?php
namespace App\Http\Controllers\API\ProductionPoubelle;

use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use App\Http\Controllers\BaseController as BaseController;
use App\Http\Resources\MateriauxPrimaire as MateriauxPrimaireResource;
use App\Models\Materiau_primaire;

class MateriauxPrimaireController extends BaseController
{
    public function index()
    {
        $materiauxPrimaire = Materiau_primaire::all();
        return $this->handleResponse(MateriauxPrimaireResource::collection($materiauxPrimaire), 'Affichage des materiauxPrimaire');
    }

    public function store(Request $request)
    {
        $input = $request->all();
        $validator = Validator::make($input, [
            'id_fournisseur' => 'required',
            'nom_materiel'=>'required',
            'prix_unitaire'=>'required',
            'quantite'=>'required',
            'prix_total'=>'required',
        ]);
        if($validator->fails()){
            return $this->handleError($validator->errors());
        }
        $materiauxPrimaire = Materiau_primaire::create($input);
        $materiauxPrimaire->save();
        return $this->handleResponse(new MateriauxPrimaireResource($materiauxPrimaire), 'materiau primaire crée!');
    }

    public function show($id)
    {
        $materiauxPrimaire = Materiau_primaire::find($id);
        if (is_null($materiauxPrimaire)) {
            return $this->handleError('materiau Primaire not found!');
        }
        return $this->handleResponse(new MateriauxPrimaireResource($materiauxPrimaire), 'materiau Primaire existe.');
    }

    public function update(Request $request, Materiau_primaire $materiauxPrimaire)
    {
        $input = $request->all();

        $validator = Validator::make($input, [
            'id_fournisseur' => 'required',
            'nom_materiel'=>'required',
            'prix_unitaire'=>'required',
            'quantite'=>'required',
            'prix_total'=>'required',
        ]);

        if($validator->fails()){
            return $this->handleError($validator->errors());
        }

        $materiauxPrimaire->id_fournisseur = $input['id_fournisseur'];
        $materiauxPrimaire->nom_materiel = $input['nom_materiel'];
        $materiauxPrimaire->prix_unitaire = $input['prix_unitaire'];
        $materiauxPrimaire->quantite = $input['quantite'];
        $materiauxPrimaire->prix_total = $input['prix_total'];

        $materiauxPrimaire->save();

        return $this->handleResponse(new MateriauxPrimaireResource($materiauxPrimaire), ' materiau Primaire modifié!');
    }

    public function destroy(Materiau_primaire $materiauxPrimaire)
    {
        $materiauxPrimaire->delete();
        return $this->handleResponse(new MateriauxPrimaireResource($materiauxPrimaire), ' materiau Primaire supprimé!');
    }
}
