<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
class CreateDetailCommandePoubellesTable extends Migration
{
    public function up()
    {
        Schema::create('detail_commande_poubelles', function (Blueprint $table) {
            $table->id();
            $table->foreignId('id_commande_poubelle')->constrained('commande_poubelles')->onDelete('cascade')->onUpdate('cascade');
            $table->foreignId('id_stock_poubelle')->constrained('stock_poubelles')->onDelete('cascade')->onUpdate('cascade');
            $table->float('quantite');
            $table->float('prix_unitaires');
            $table->timestamps();
            $table->softDeletes();
        });
        Schema::enableForeignKeyConstraints();
    }
    public function down()
    {
        Schema::table("detail_commande_poubelles",function(Blueprint $table){
            $table->dropForeignKey("id_commande_poubelle");
        });
        Schema::table("detail_commande_poubelles",function(Blueprint $table){
            $table->dropForeignKey("id_stock_poubelle");
        });
        Schema::dropIfExists('detail_commande_poubelles');
    }
}



