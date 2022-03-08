<?php
namespace Database\Factories;
use Illuminate\Database\Eloquent\Factories\Factory;
class PoubelleFactory extends Factory{
    public function definition(){
        $type_poubelle = $this->faker->randomElement(['PL','PA','CO','CA']);
        $zone_travail =  \App\Models\Zone_travail::all()->random()->id;
        $etablissement =  \App\Models\Etablissement::all()->random()->id;
        $bloc_poubelle = \App\Models\Bloc_poubelle::all()->random()->id;

        return [
            'id_bloc_poubelle'=>$bloc_poubelle,
            'nom'=>$type_poubelle.'-Z'.$zone_travail.'-E'.$etablissement.'-B'.$bloc_poubelle,
            'qrcode' => $this->faker->image('public/storage/images/qrcode/poubelle',640,480, null, false),
            'capacite_poubelle'=>$this->faker->randomNumber(4,true),
            'type'=>  $this->faker->randomElement(['plastique','papier','composte','canette']),
            'Etat'=>$this->faker->numberBetween(0,100),
            'temps_remplissage'=>$this->faker->dateTimeBetween('now', '+7 days')->format('Y.m.d H:i:s'),
        ];
    }
}
