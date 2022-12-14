<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMateriauxTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('materiaux', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nom');
            $table->string('photo')->nullable();
            $table->integer('quantiteStock');
            $table->string('marque');
            $table->datetime('date_entree')->nullable();
            $table->string('description');
            
            $table->integer('fournisseur_id')->unsigned();
            $table->foreign('fournisseur_id')->references('id')->on('fournisseurs');
            
            $table->integer('categorie_id')->unsigned();
            $table->foreign('categorie_id')->references('id')->on('categories');
        
            $table->integer('user_id')->unsigned();
            $table->foreign('user_id')->references('id')->on('users');

            $table->timestamps();
            $table->datetime('deleted_at')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('materiaux');
    }
}
