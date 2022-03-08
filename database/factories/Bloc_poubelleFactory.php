<?php
namespace Database\Factories;
use Illuminate\Database\Eloquent\Factories\Factory;
class Bloc_poubelleFactory extends Factory{
    public function definition() {
        return [
            'id_etablissement'=> \App\Models\Etablissement::all()->random()->id,
            'emplacement'=> $this->faker->sentence,
        ];
    }
}
