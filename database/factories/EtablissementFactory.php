<?php

namespace Database\Factories;

use App\Models\Etablissement;
use Illuminate\Database\Eloquent\Factories\Factory;

class EtablissementFactory extends Factory{

    public function definition() {
        return [
            'id_zone_travail'=>\App\Models\Zone_travail::all()->random()->id,
            'id_responsable_etablissement'=>\App\Models\Responsable_etablissement::all()->random()->id,
            'nom_etablissement'=> $this->faker->name,
            'nbr_personnes'=> $this->faker->randomNumber(4, true),
            'adresse'=> $this->faker->address,
            'longitude'=> $this->faker->longitude($min = -180, $max = 180),
            'latitude'=> $this->faker->latitude($min = -90, $max = 90),
            'quantite_dechets_plastique'=> $this->faker->randomFloat(3,0, 1000),
            'quantite_dechets_composte'=> $this->faker->randomFloat(3,0, 1000),
            'quantite_dechets_papier'=> $this->faker->randomFloat(3,0, 1000),
            'quantite_dechets_canette'=> $this->faker->randomFloat(3,0, 1000),
        ];
    }
}
