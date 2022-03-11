<?php
namespace Database\Factories;
use Illuminate\Database\Eloquent\Factories\Factory;
class Detail_commande_poubelleFactory extends Factory
{
    public function definition()
    {
        return [
            'id_commande_poubelle'=>\App\Models\Etablissement::all()->random()->id,
            'id_stock_poubelle'=>\App\Models\Etablissement::all()->random()->id,
            'quantite'=> $this->faker->numberBetween(1,100),
            'prix_unitaires'=> $this->faker->randomFloat(3,1000,90000),
        ];
    }
}
