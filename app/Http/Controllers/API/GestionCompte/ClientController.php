<?php
namespace App\Http\Controllers\API\GestionCompte;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use App\Http\Controllers\BaseController as BaseController;
use App\Http\Resources\Client_dechet as Client_dechetResource;
use App\Models\Client_dechet;

class Client_dechetController extends BaseController{
    public function index(){
        $client = Client_dechet::all();
        return $this->handleResponse(Client_dechetResource::collection($client), 'Affichage des clients!');
    }
    public function store(Request $request)  {
        $input = $request->all();
        $validator = Validator::make($input, [
            'nom' => 'required|string|regex:/^[A-Za-z]*$/i',
            'prenom' => 'required|string|regex:/^[A-Za-z]*$/i',
            'CIN'=>'required|numeric',
            'photo'=> 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'adresse'=> 'required',
            'numero_telephone'=> 'required',
            'email'=> 'required|email',
            'quantite_total_achete'=> 'required',
            'mot_de_passe'=> 'required',
        ]);
        if($validator->fails()){
            return $this->handleError($validator->errors());
        }
        $client = Client_dechet::create($input);
        $client->save();
        return $this->handleResponse(new Client_dechetResource($client), 'Client crée!');
    }

    public function show($id)
    {
        $client = Client_dechet::find($id);
        if (is_null($client)) {
            return $this->handleError('client not found!');
        }
        return $this->handleResponse(new Client_dechetResource($client), 'Client existe.');
    }

    public function update(Request $request, Client_dechet $client)
    {
        $input = $request->all();
        $validator = Validator::make($input, [
            'nom' => 'required|string|regex:/^[A-Za-z]*$/i',
            'prenom' => 'required|string|regex:/^[A-Za-z]*$/i',
            'CIN'=>'required|numeric',
            'photo'=> 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'adresse'=> 'required|string',
            'numero_telephone'=> 'required|numeric',
            'email'=> 'required|email',
            'type_dechet_achete'=> 'required|in:plastique,composte,papier,canette',
            'quantite_total_achete'=> 'required',
            'mot_de_passe'=> 'required',
        ]);

        if($validator->fails()){
            return $this->handleError($validator->errors());
        }
        $client->nom = $input['nom'];
        $client->prenom = $input['prenom'];
        $client->CIN = $input['CIN'];
        $client->photo = $input['photo'];
        $client->numero_telephone = $input['numero_telephone'];
        $client->email = $input['email'];
        $client->type_dechet_achete = $input['type_dechet_achete'];
        $client->quantite_total_achete = $input['quantite_total_achete'];
        $client->mot_de_passe = $input['mot_de_passe'];
        $client->save();
        return $this->handleResponse(new Client_dechetResource($client), 'Client modifié!');
    }

    public function destroy(Client_dechet $client) {
        $client->delete();
        return $this->handleResponse(new Client_dechetResource($client), 'Client supprimé!');
    }

}
