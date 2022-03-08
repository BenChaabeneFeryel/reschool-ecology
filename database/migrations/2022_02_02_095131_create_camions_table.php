<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
class CreateCamionsTable extends Migration{
    public function up(){
        Schema::create('camions', function (Blueprint $table) {
            $table->id();
            $table->foreignId('id_zone_travail')->constrained('zone_travails')->onDelete('cascade')->onUpdate('cascade');
            $table->string('matricule');
            $table->string('qrcode');
            $table->datetime('heure_sortie');
            $table->datetime('heure_entree');
            $table->float('longitude');
            $table->float('latitude');
            $table->float('volume_maximale_poubelle');
            $table->float('volume_actuelle_plastique');
            $table->float('volume_actuelle_papier');
            $table->float('volume_actuelle_composte');
            $table->float('volume_actuelle_canette');
            $table->float('volume_carburant_consomme');
            $table->float('Kilometrage');
            $table->timestamps();
            $table->softDeletes();
        });
        Schema::enableForeignKeyConstraints();
    }
    public function down()
    {
        Schema::table("camions",function(Blueprint $table){
            $table->dropForeignKey("id_zone_travail");
        });
        Schema::dropIfExists('camions');
    }
}
