<?php
namespace Database\Seeders;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\{ User, Gestionnaire,Fournisseur,Client_dechet,Mecanicien,Reparateur_poubelle,Zone_travail,Responsable_etablissement,Etablissement,Camion,Ouvrier,
    Bloc_poubelle,Poubelle ,Commande_dechet,Commande_poubelle,Dechet,Depot,Detail_commande_dechet,Detail_commande_poubelle,Materiau_primaire,Reparation_camion,
    Reparation_poubelle,Stock_poubelle,Zone_depot};

class DatabaseSeeder extends Seeder{
    public function run(){
        User::factory(5)->create();
        Gestionnaire::factory(5)->create();
        Fournisseur::factory(5)->create();
        Client_dechet::factory(5)->create();
        Mecanicien::factory(5)->create();
        Reparateur_poubelle::factory(5)->create();
        Zone_travail::factory(5)->create();
        Responsable_etablissement::factory(1)->create();
        Etablissement::factory(1)->create();
        Camion::factory(5)->create();
        Ouvrier::factory(5)->create();
        Bloc_poubelle::factory(5)->create();
        Poubelle::factory(5)->create();
        Reparation_camion::factory(5)->create();
        Reparation_poubelle::factory(5)->create();
        Materiau_primaire::factory(5)->create();

        Stock_poubelle::factory(5)->create();
        Zone_depot::factory(5)->create();

        Dechet::factory(5)->create();
        Depot::factory(5)->create();

        Commande_dechet::factory(5)->create();
        Commande_poubelle::factory(5)->create();

        Detail_commande_dechet::factory(5)->create();
        Detail_commande_poubelle::factory(5)->create();


/*    Etablissement::factory()
        ->has(\App\Models\Zone_travail::factory()->count(4))
        ->count(10)
        ->create();

            Etablissement::factory(5)->create() ->each(function ($u) {
            $u->responsable_etablissement()->save(\App\Models\Responsable_etablissement::factory()->make());
        });
        */

    }
}
