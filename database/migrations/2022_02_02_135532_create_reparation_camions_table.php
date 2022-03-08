<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateReparationCamionsTable extends Migration
{
    public function up()
    {
        Schema::create('reparation_camions', function (Blueprint $table) {
            $table->id();
            $table->foreignId('id_camion')->constrained('camions')->onDelete('cascade')->onUpdate('cascade');
            $table->foreignId('id_mecanicien')->constrained('mecaniciens')->onDelete('cascade')->onUpdate('cascade');
            $table->text('description_panne');
            $table->float('cout');
            $table->dateTime('date_debut_reparation');
            $table->dateTime('date_fin_reparation');
            $table->timestamps();
            $table->softDeletes();
        });
        Schema::enableForeignKeyConstraints();
    }
    public function down()
    {
        Schema::table("reparation_camions",function(Blueprint $table){
            $table->dropForeignKey("id_camion");
        });
        Schema::table("reparation_camions",function(Blueprint $table){
            $table->dropForeignKey("id_mecanicien");
        });
        Schema::dropIfExists('reparation_camions');
    }
}
