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
        Schema::create('detail_bon_sorties', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('bon_sortie_id');
            $table->unsignedBigInteger('produit_id');
            $table->bigInteger('quantite');
            $table->unsignedBigInteger('conditionnement_id');
            $table->timestamps();

            $table->foreign('bon_sortie_id')->references('id')->on('bon_sorties');
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
        Schema::dropIfExists('detail_bon_sorties');
    }
};
