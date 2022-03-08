<?php
namespace App\Http\Controllers\API;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use App\Http\Controllers\BaseController as BaseController;
use App\Http\Resources\Commande as CommandeResource;
use App\Models\Commande_dechet;

class CommandeController extends BaseController
{
    public function index(){
        $commande = Commande_dechet::all();
        return $this->handleResponse(CommandeResource::collection($commande), 'commande have been retrieved!');
    }


    public function store(Request $request)
    {
        $input = $request->all();
        $validator = Validator::make($input, [
            'id_client'=> 'required',
            'quantite'=> 'required',
            'prix'=> 'required',
            'date_commande'=> 'required',
            'date_livraison'=> 'required',
        ]);
        if($validator->fails()){
            return $this->handleError($validator->errors());
        }
        $commande = Commande_dechet::create($input);
        $commande->save();
        return $this->handleResponse(new CommandeResource($commande), 'commande crée!');
    }


    public function show($id)
    {
        $commande = Commande_dechet::find($id);
        if (is_null($commande)) {
            return $this->handleError('commande not found!');
        }
        return $this->handleResponse(new CommandeResource($commande), 'commande retrieved.');
    }

    public function update(Request $request, Commande_dechet $commande)
    {
        $input = $request->all();

        $validator = Validator::make($input, [
            'id_client'=> 'required',
            'quantite'=> 'required',
            'prix'=> 'required',
            'date_commande'=> 'required',
            'date_livraison'=> 'required',
        ]);

        if($validator->fails()){
            return $this->handleError($validator->errors());
        }
        $commande->id_client = $input['id_client'];
        $commande->quantite = $input['quantite'];
        $commande->prix = $input['prix'];
        $commande->date_commande = $input['date_commande'];
        $commande->date_livraison = $input['date_livraison'];

        $commande->save();

        return $this->handleResponse(new CommandeResource($commande), 'commande successfully updated!');
    }

    public function destroy(Commande_dechet $commande)
    {
        $commande->delete();
        return $this->handleResponse(new CommandeResource($commande), 'commande deleted!');
    }
}
