<?php
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\API\GestionCompte\GestionnaireController;
use App\Http\Controllers\API\GestionCompte\Client_dechetController;
use App\Http\Controllers\API\GestionCompte\OuvrierController;
use App\Http\Controllers\API\GestionCompte\ResponsableEtablissementController;

use App\Http\Controllers\API\GestionDechet\Commande_dechetController;
use App\Http\Controllers\API\GestionDechet\DechetController;

use App\Http\Controllers\API\GestionPanne\MecanicienController;
use App\Http\Controllers\API\GestionPanne\Reparation_camionController;
use App\Http\Controllers\API\GestionPanne\Reparateur_poubelleController;
use App\Http\Controllers\API\GestionPanne\Reparation_poubelleController;

use App\Http\Controllers\API\GestionPoubelleEtablissements\Bloc_poubelleController;
use App\Http\Controllers\API\GestionPoubelleEtablissements\EtablissementController;
use App\Http\Controllers\API\GestionPoubelleEtablissements\Zone_travailController;
use App\Http\Controllers\API\GestionPoubelleEtablissements\PoubelleController;

use App\Http\Controllers\API\ProductionPoubelle\FournisseurController;
use App\Http\Controllers\API\ProductionPoubelle\StockPoubelleController;
use App\Http\Controllers\API\ProductionPoubelle\MateriauxPrimaireController;


use App\Http\Controllers\API\TransportDechet\CamionController;
use App\Http\Controllers\API\TransportDechet\DepotController;
use App\Http\Controllers\API\TransportDechet\Zone_depotController;


use App\Http\Controllers\API\Ouvrier\ViderController;
use App\Http\Controllers\API\Dashboard\CompteurController;
use App\Http\Controllers\API\Ouvrier\TriageController;
use App\Http\Controllers\API\Ouvrier\SommeDechetController;


/*Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();*/
 /** -------------------------------------------gestion Compte -----------------------------------------*/
            /**                 administrateurs                        */
        Route::apiResource('gestionnaire', GestionnaireController::class);
        Route::delete('/gestionnaire/hard-delete/{id}', [GestionnaireController::class, 'hdelete']);
        Route::get('/gestionnaire/restore/{id}', [GestionnaireController::class, 'restore']);
        Route::get('/gestionnaire/restoreall', [GestionnaireController::class, 'restoreAll']);
        Route::get('/gestionnaire/trash', [GestionnaireController::class, 'trashedAdmin']);
            /**                 client                                  */
        Route::apiResource('client', Client_dechetController::class);

            /**                  ouvrier                                */
        Route::apiResource('ouvrier', OuvrierController::class);

            /**                  responsable etablissement              */
        Route::apiResource('responsable-etablissement', ResponsableEtablissementController::class);
 /** -------------------------------------------gestion Dechet -----------------------------------------*/
            /**                  commandes                     */
        Route::apiResource('commande-dechet', Commande_dechetController::class);

            /**                  dechets                       */
        Route::apiResource('dechets', DechetController::class);
 /** -------------------------------------------gestion Panne -----------------------------------------*/
                /**                        reparateur poubelle             */
        Route::apiResource('reparateur-poubelle', Reparateur_poubelleController::class);
        Route::get('/reparateur-poubelle/serachAdresse/{adresse}', [Reparateur_poubelleController::class, 'serachAdresse']);

                /**                        mecanicien                  */
        Route::apiResource('mecanicien', MecanicienController::class);

                /**                        reparation poubelle            */
        Route::apiResource('reparation-poubelle', Reparation_poubelleController::class);

                /**                        reparation camion               */
        Route::apiResource('reparation-camion', Reparation_camionController::class);
 /** -------------------------------------------gestion Poubelle par etablissement -----------------------------------------------*/
               /**                   zone-travail                        */
        Route::apiResource('zone-travail', Zone_travailController::class);
        Route::get('/zone-travail/searchRegion/{region}', [Zone_travailController::class, 'searchRegion']);

                /**                  etablissement                      */
        Route::apiResource('etablissement', EtablissementController::class);
        Route::get('/etablissement/searchZone_travail/{id_zone_travail}', [EtablissementController::class, 'searchZone_travail']);

                /**                  bloc-poubelle                      */
        Route::apiResource('bloc-poubelle', Bloc_poubelleController::class);
        Route::get('/bloc-poubelle/searchEtablissement/{id_etablissement}', [Bloc_poubelleController::class, 'searchEtab']);

                /**                    poubelle                        */
        Route::apiResource('poubelle', PoubelleController::class);
        Route::get('/poubelle/searchBlocPoubelle/{id_bloc_poubelle}', [PoubelleController::class, 'searchBlocPoubelle']);
        Route::get('/poubelle/searchEType/{type}', [PoubelleController::class, 'searchEType']);

 /** -------------------------------------------transport poubelle -----------------------------------------*/
              /**                       camion                            */
       Route::apiResource('camion', CamionController::class);
       Route::get('/camion/searchMatricule/{matricule}', [CamionController::class, 'searchMatricule']);

             /**                        zone depot                       */
       Route::apiResource('zone-depot', Zone_depotController::class);

             /**                       depot                            */
       Route::apiResource('depot', DepotController::class);

 /** -------------------------------------------production poubelle -----------------------------------------*/
               /**                   Fournisseur                         */
        Route::apiResource('fournisseurs', FournisseurController::class);
              /**                    Materiaux Primaires               */
        Route::apiResource('materiaux-primaires',MateriauxPrimaireController::class);
               /**                   Stock poubelle                  */
        Route::apiResource('stock-poubelle', StockPoubelleController::class);



 /** -------------------------------------------Ouvrier -----------------------------------------*/

        Route::get('/viderPoubelle/{ouvrier}/{poubelle}', [ViderController::class, 'ViderPoubelle']);
        Route::get('/viderCamion/{depot}', [ViderController::class, 'ViderCamion']);

 /** -------------------------------------------trier -----------------------------------------*/

        Route::get('/trier-etablissement-zonetravail/{id_zone_travail}', [TriageController::class, 'TrierEtablissementParZoneEtablissement']);

/** -------------------------------------------Dashboard -----------------------------------------*/
        Route::get('/dashboard', [CompteurController::class, 'dashbordValeur']);
        Route::get('/somme-total-dechet-zone-depot', [SommeDechetController::class, 'SommeDechetZoneDepot']);
        Route::get('/somme-total-dechet-zone-travail', [SommeDechetController::class, 'SommeDechetZoneTravail']);
        Route::get('/somme-total-dechet-etablissement/{id_zone_travail}', [SommeDechetController::class, 'SommeDechetBlocEtablissement']);


        Route::get('/trierPoubelle', [SommeDechetController::class, 'trierPoubelle']);


