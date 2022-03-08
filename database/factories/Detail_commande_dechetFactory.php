<?php
namespace Database\Factories;
use Illuminate\Database\Eloquent\Factories\Factory;
class Detail_commande_dechetFactory extends Factory{
    public function definition()
    {
        return [
                'id_commande_dechet'=>\App\Models\Commande_dechet::all()->random()->id,
                'id_dechet'=>\App\Models\Dechet::all()->random()->id,
                'quantite'=> $this->faker->numberBetween(1000,999999),
        ];
    }
}
