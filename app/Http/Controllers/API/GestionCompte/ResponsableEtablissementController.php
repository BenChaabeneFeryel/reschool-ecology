<?php
namespace App\Http\Controllers\API\GestionCompte;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use App\Http\Controllers\BaseController as BaseController;
use App\Http\Resources\GestionCompte\Responsable_etablissement as Responsable_etablissementResource;
use App\Models\Responsable_etablissement;

class ResponsableEtablissementController extends BaseController
{
    public function index(){
        //
    }
    public function store(Request $request){
        //
    }

    public function show(Responsable_etablissement $responsableEtablissement)
    {
        //
    }

    public function update(Request $request, Responsable_etablissement $responsableEtablissement)
    {
        //
    }

    public function destroy(Responsable_etablissement $responsableEtablissement)
    {
        //
    }
}
