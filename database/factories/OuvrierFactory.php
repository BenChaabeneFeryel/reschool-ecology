<?php
namespace Database\Factories;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Eloquent\Factories\Factory;
class OuvrierFactory extends Factory{
    public function definition(){
        return [
            'id_etablissement'=> \App\Models\Etablissement::all()->random()->id,
            'id_camion'=>  \App\Models\Camion::all()->random()->id,
            'poste'=>  $this->faker->randomElement(['conducteur' ,'agent']),
            'qrcode' => $this->faker->image('public/storage/images/qrcode/ouvrier',640,480, null, false),
            'nom'=> $this->faker->firstName,
            'prenom'=> $this->faker->lastName,
            'CIN'=> $this->faker->unique()->numerify('########'),
            'photo' => $this->faker->image('public/storage/images/ouvrier',640,480, null, false),
            'numero_telephone'=> $this->faker->unique()->e164PhoneNumber,
            'email'=> $this->faker->safeEmail,
            'mot_de_passe'=> Hash::make($this->faker->password),
        ];
    }
}
