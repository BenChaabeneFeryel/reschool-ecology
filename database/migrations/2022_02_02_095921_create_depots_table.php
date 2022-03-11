<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
class CreateDepotsTable extends Migration{
    public function up()
    {
        Schema::create('depots', function (Blueprint $table) {
            $table->id();
            $table->foreignId('id_zone_depot')->constrained('zone_depots')->onDelete('cascade')->onUpdate('cascade');
            $table->foreignId('id_camion')->constrained('camions')->onDelete('cascade')->onUpdate('cascade');
            $table->dateTime('date_depot');
            $table->float('quantite_depose');
            $table->float('prix_total');
            $table->timestamps();
            $table->softDeletes();
        });
        Schema::enableForeignKeyConstraints();
    }
    public function down()
    {
        Schema::table("depots",function(Blueprint $table){
            $table->dropForeignKey("id_zone_depot");
        });

        Schema::table("depots",function(Blueprint $table){
            $table->dropForeignKey("id_camion");
        });
        Schema::dropIfExists('depots');
    }
}
