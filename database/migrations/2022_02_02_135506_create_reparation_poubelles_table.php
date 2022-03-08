<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
class CreateReparationPoubellesTable extends Migration{
    public function up()
    {
        Schema::create('reparation_poubelles', function (Blueprint $table) {
            $table->id();
            $table->foreignId('id_poubelle')->constrained('poubelles')->onDelete('cascade')->onUpdate('cascade');
            $table->foreignId('id_reparateur_poubelle')->constrained('reparateur_poubelles')->onDelete('cascade')->onUpdate('cascade');
            $table->text('description_panne');
            $table->float('cout');
            $table->dateTime('date_debut_reparation');
            $table->dateTime('date_fin_reparation');
            $table->timestamps();
            $table->softDeletes();
        });
        Schema::enableForeignKeyConstraints();
    }
    public function down() {
        Schema::table("reparation_poubelles",function(Blueprint $table){
            $table->dropForeignKey("id_poubelle");
        });
        Schema::table("reparation_poubelles",function(Blueprint $table){
            $table->dropForeignKey("id_reparateur_poubelle");
        });
        Schema::dropIfExists('reparation_poubelles');
    }
}
