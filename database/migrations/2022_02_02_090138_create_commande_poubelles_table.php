<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCommandePoubellesTable extends Migration
{
    public function up()
    {
        Schema::create('commande_poubelles', function (Blueprint $table) {
            $table->id();
            $table->foreignId('id_responsable_etablissement')->constrained('responsable_etablissements')->onDelete('cascade')->onUpdate('cascade');
            $table->float('quantite');
            $table->float('montant_total');
            $table->datetime('date_commande');
            $table->datetime('date_livraison');
            $table->timestamps();
            $table->softDeletes();
       });
       Schema::enableForeignKeyConstraints();
    }
    public function down()
    {
        Schema::table("commande_poubelles",function(Blueprint $table){
            $table->dropForeignKey("id_responsable_etablissement");
        });
        Schema::dropIfExists('commande_poubelles');
    }
};
