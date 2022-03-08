<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOuvriersTable extends Migration{
    public function up(){
        Schema::create('ouvriers', function (Blueprint $table) {
            $table->id();
            $table->foreignId('id_etablissement')->constrained('etablissements')->onDelete('cascade')->onUpdate('cascade');
            $table->foreignId('id_camion')->constrained('camions')->onDelete('cascade')->onUpdate('cascade');
            $table->enum('poste', ['conducteur', 'agent']);
            $table->string('qrcode');
            $table->string('nom',20);
            $table->string('prenom',20);
            $table->string('CIN',8)->unique();
            $table->string('photo');
            $table->string('numero_telephone',12);
            $table->string('email',40)->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('mot_de_passe',255);
            $table->timestamps();
            $table->softDeletes();
        });
        Schema::enableForeignKeyConstraints();
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table("ouvriers",function(Blueprint $table){
            $table->dropForeignKey("id_etablissement");
        });
        Schema::table("ouvriers",function(Blueprint $table){
            $table->dropForeignKey("id_camion");
        });
        Schema::dropIfExists('ouvriers');
    }
}
