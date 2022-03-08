<?php
namespace Database\Factories;

use App\Models\Responsable_etablissement;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Hash;
class Responsable_etablissementFactory extends Factory{
    protected $model = Responsable_etablissement::class;
    public function definition(){
        return [
            'nom'=> $this->faker->firstName,
            'prenom'=> $this->faker->lastName,
            'CIN'=> $this->faker->unique()->numerify('########'),
            'photo' => $this->faker->image('public/storage/images/responable_etablissement',640,480, null, false),
            'numero_telephone'=> $this->faker->unique()->e164PhoneNumber,
            'email'=> $this->faker->safeEmail,
            'mot_de_passe'=> Hash::make($this->faker->password),
        ];
    }
}
