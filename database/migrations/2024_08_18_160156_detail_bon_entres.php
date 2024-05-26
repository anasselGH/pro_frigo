<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('detail_bon_entres', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('bon_entre_id');
            $table->unsignedBigInteger('produit_id');
            $table->bigInteger('quantite');
            $table->bigInteger('prix');
            $table->unsignedBigInteger('conditionnement_id');
            $table->timestamps();

            $table->foreign('bon_entre_id')->references('id')->on('bon_entres');
            $table->foreign('produit_id')->references('id')->on('produits');
            $table->foreign('conditionnement_id')->references('id')->on('conditionnements');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('detail_bon_entres');
    }
};
