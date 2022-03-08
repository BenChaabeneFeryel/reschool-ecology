<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
class CreateStockPoubellesTable extends Migration{
    public function up(){
        Schema::create('stock_poubelles', function (Blueprint $table) {
            $table->id();
            $table->integer('quantite_disponible_plastique');
            $table->integer('quantite_disponible_canette');
            $table->integer('quantite_disponible_composte');
            $table->integer('quantite_disponible_papier');
            $table->integer('capacite_poubelle');
            $table->timestamps();
            $table->softDeletes();
        });
    }
    public function down(){
        Schema::dropIfExists('stock_poubelles');
    }
};
