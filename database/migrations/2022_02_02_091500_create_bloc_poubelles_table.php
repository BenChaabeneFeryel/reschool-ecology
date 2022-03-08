<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
class CreateBlocPoubellesTable extends Migration{
    public function up(){
        Schema::create('bloc_poubelles', function (Blueprint $table) {
            $table->id();
            $table->foreignId('id_etablissement')->constrained('etablissements')->onDelete('cascade')->onUpdate('cascade');
            $table->string('emplacement');
            $table->timestamps();
            $table->softDeletes();
        });
        Schema::enableForeignKeyConstraints();
    }
    public function down(){
        Schema::table("bloc_poubelles",function(Blueprint $table){
            $table->dropForeignKey("id_etablissement");
        });
        Schema::dropIfExists('bloc_poubelles');
    }
}
