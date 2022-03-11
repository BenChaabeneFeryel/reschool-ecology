<?php
namespace App\Http\Controllers\API\GestionDechet;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use App\Http\Controllers\BaseController as BaseController;
use App\Http\Resources\Dechet as DechetResource;
use App\Models\Dechet;
class DechetController extends BaseController{
    public function index()
    {
        $dechet = Dechet::all();
        return $this->handleResponse(DechetResource::collection($dechet), 'dechet have been retrieved!');
    }
    public function store(Request $request)
    {
        $input = $request->all();
        $validator = Validator::make($input, [
            'type_dechet' => 'required',
            'prix_unitaire' => 'required'
        ]);
        if($validator->fails()){
            return $this->handleError($validator->errors());
        }
        $dechet = Dechet::create($input);
        $dechet->save();
        return $this->handleResponse(new DechetResource($dechet), 'dechet crée!');
    }


    public function show($id)
    {
        $dechet = Dechet::find($id);
        if (is_null($dechet)) {
            return $this->handleError('dechet not found!');
        }
        return $this->handleResponse(new DechetResource($dechet), 'dechet retrieved.');
    }

    public function update(Request $request, Dechet $dechet)
    {
        $input = $request->all();

        $validator = Validator::make($input, [
            'type_dechet' => 'required',
            'prix_unitaire' => 'required'
        ]);

        if($validator->fails()){
            return $this->handleError($validator->errors());
        }

        $dechet->type_dechet = $input['type_dechet'];
        $dechet->prix_unitaire = $input['prix_unitaire'];
        $dechet->save();

        return $this->handleResponse(new DechetResource($dechet), 'dechet successfully updated!');
    }

    public function destroy(Dechet $dechet)
    {
        $dechet->delete();
        return $this->handleResponse(new DechetResource($dechet), 'dechet deleted!');
    }

}
