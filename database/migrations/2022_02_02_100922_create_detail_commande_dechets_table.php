<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
class CreateDetailCommandeDechetsTable extends Migration{
    public function up() {
        Schema::create('detail_commande_dechets', function (Blueprint $table) {
            $table->id();
            $table->foreignId('id_commande_dechet')->constrained('commande_dechets')->onDelete('cascade')->onUpdate('cascade');
            $table->foreignId('id_dechet')->constrained('dechets')->onDelete('cascade')->onUpdate('cascade');
            $table->float('quantite');
            $table->timestamps();
            $table->softDeletes();
        });
        Schema::enableForeignKeyConstraints();
    }
    public function down() {
        Schema::table("detail_commande_dechets",function(Blueprint $table){
            $table->dropForeignKey("id_commande_dechet");
        });
        Schema::table("detail_commande_dechets",function(Blueprint $table){
            $table->dropForeignKey("id_dechet");
        });
        Schema::dropIfExists('detail_commande_dechets');
    }
};
