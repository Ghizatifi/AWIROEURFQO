<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateElevesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::enableForeignKeyConstraints();
        Schema::create('eleves', function (Blueprint $table) {
            $table->increments('id_eleve')->unsigned();
            $table->integer('user_id')->unsigned();
            $table->string('nom',20);
            $table->string('prenom',20);
            $table->date('date_naissance');
            $table->string('nationalite');
            $table->string('ville');
            $table->string('rue');
            $table->string('province');
            $table->string('sexe');
            $table->string('nom_Pere');
            $table->string('nom_Mere');
            $table->string('phone',50);
            $table->string('fix',50)->nullable();
            $table->string('photo',200)->nullable();  
            $table->string('adresse_travail',80);
            $table->string('phone_urgence',50);
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
        Schema::dropIfExists('eleves');
    }
}
