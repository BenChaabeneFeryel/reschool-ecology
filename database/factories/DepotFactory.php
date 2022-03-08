<?php
namespace Database\Factories;
use Illuminate\Database\Eloquent\Factories\Factory;
class DepotFactory extends Factory{
    public function definition()
    {
        return [
            'id_zone_depot'=>\App\Models\Fournisseur::all()->random()->id,
            'id_dechet'=>\App\Models\Fournisseur::all()->random()->id,
            'id_camion'=>\App\Models\Fournisseur::all()->random()->id,
            'date_depot'=>$this->faker->date('Y-m-d h-i-s','now'),
            'quantite_depose'=> $this->faker->randomFloat(3,0,9999),
            'prix_total'=> $this->faker->randomNumber(5),
        ];
    }
}
