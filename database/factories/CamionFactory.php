<?php
namespace Database\Factories;
use Illuminate\Database\Eloquent\Factories\Factory;
class CamionFactory extends Factory{
    public function definition(){
        return [
            'id_zone_travail'=>\App\Models\Zone_travail::all()->random()->id,
            'matricule' =>$this->faker->unique()->bothify('???######????'),
            'qrcode' => $this->faker->image('public/storage/images/qrcode/camion',640,480, null, false),
            'heure_sortie'=>$this->faker->dateTimeBetween('now', '+1 days')->format('Y.m.d H:i:s'),
            'heure_entree'=>$this->faker->dateTimeBetween('now', '+1 days')->format('Y.m.d H:i:s'),
            'longitude'=> $this->faker->longitude($min = -180, $max = 180),
            'latitude'=> $this->faker->latitude($min = -90, $max = 90),
            'volume_maximale_poubelle'=> $this->faker->randomFloat(0,0,360),
            'volume_actuelle_plastique'=> $this->faker->randomFloat(3,0,359),
            'volume_actuelle_papier'=> $this->faker->randomFloat(3,0, 359),
            'volume_actuelle_composte'=> $this->faker->randomFloat(3,0, 359),
            'volume_actuelle_canette'=> $this->faker->randomFloat(3,0, 359),
            'volume_carburant_consomme'=> $this->faker->randomFloat(3,0,100),
            'Kilometrage'=> $this->faker->randomFloat(3,0, 1000),
        ];
    }
}
