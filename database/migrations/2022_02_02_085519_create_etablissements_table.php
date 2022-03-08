<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEtablissementsTable extends Migration
{
    public function up()
    {
        Schema::create('etablissements', function (Blueprint $table) {
            $table->id();
            $table->foreignId('id_zone_travail')->constrained('zone_travails')->onDelete('cascade')->onUpdate('cascade');
            $table->foreignId('id_responsable_etablissement')->constrained('responsable_etablissements')->onDelete('cascade')->onUpdate('cascade');
            $table->string('nom_etablissement',30);
            $table->integer('nbr_personnes');
            $table->string('adresse');
            $table->float('longitude');
            $table->float('latitude');
            $table->float('quantite_dechets_plastique')->default(0);
            $table->float('quantite_dechets_composte')->default(0);
            $table->float('quantite_dechets_papier')->default(0);
            $table->float('quantite_dechets_canette')->default(0);
            $table->timestamps();
            $table->softDeletes();

        });
        Schema::enableForeignKeyConstraints();
    }

    public function down()
    {
        Schema::table("etablissements",function(Blueprint $table){
            $table->dropForeignKey("id_responsable_etablissement");
        });

        Schema::table("etablissements",function(Blueprint $table){
            $table->dropForeignKey("id_zone_travail");
        });

        Schema::dropIfExists('etablissements');
    }
}
