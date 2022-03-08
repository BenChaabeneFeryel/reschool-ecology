<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
class Reparation_poubelleFactory extends Factory{
    public function definition()
    {
        return [
            'id_poubelle'=>\App\Models\Poubelle::all()->random()->id,
            'id_reparateur_poubelle'=>\App\Models\Reparateur_poubelle::all()->random()->id,
            'description_panne'=> $this->faker->sentence,
            'cout'=> $this->faker->numberBetween(5000,100000),
            'date_debut_reparation'=>$this->faker->dateTimeBetween('now','+30 days')->format('Y.m.d H:i:s'),
            'date_fin_reparation'=>$this->faker->dateTimeBetween('date_debut_reparation', '+30 days')->format('Y.m.d H:i:s'),
        ];
    }
}
