<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
class CreateGestionnairesTable extends Migration
{
    public function up()
    {
        Schema::create('gestionnaires', function (Blueprint $table) {
            $table->id();
            $table->string('nom',20);
            $table->string('prenom',20);
            $table->string('CIN')->unique();
            $table->string('numero_telephone')->unique();;
            $table->string('email',40)->unique();
            $table->string('photo');
            $table->timestamp('email_verified_at')->nullable();
            $table->string('mot_de_passe',255);
            $table->timestamps();
            $table->softDeletes();
        });
    }
    public function down()
    {

        Schema::dropIfExists('gestionnaires');
    }
}
