<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateParentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('parents', function (Blueprint $table) {
            $table->increments('id_parent');
            $table->string('nom',20);
            $table->string('prenom',20);
            $table->date('date_naissance');
            $table->string('nationalite');
            $table->string('adresse');
            $table->string('sexe');
            $table->string('cin');
            $table->string('phone',50);
            $table->string('fix',200)->nullable(); 
            $table->string('photo',200)->nullable(); 
            $table->string('lieuTravail')->nullable(); 
            $table->string('sexe');
            $table->string('typeParite'); 
            $table->integer('user_id')->unsigned();
            $table->foreign('user_id')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('parents');
    }
}
