<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePoubellesTable extends Migration
{
    public function up()
    {
        Schema::create('poubelles', function (Blueprint $table) {
            $table->id();
            $table->foreignId('id_bloc_poubelle')->constrained('bloc_poubelles')->onDelete('cascade')->onUpdate('cascade');
            $table->string('nom');
            $table->string('qrcode');
            $table->integer('capacite_poubelle');
            $table->enum('type', ['plastique', 'composte','papier','canette']);
            $table->float('Etat');
            $table->dateTime('temps_remplissage');
            $table->timestamps();
            $table->softDeletes();
        });
        Schema::enableForeignKeyConstraints();
      }
    public function down()
    {
        Schema::table("poubelles",function(Blueprint $table){
            $table->dropForeignKey("id_bloc_poubelle");
        });
        Schema::dropIfExists('poubelles');
    }
}
