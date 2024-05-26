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
        Schema::create('detail_bon_livraisons', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('bon_livraison_id');
            $table->unsignedBigInteger('produit_id');
            $table->double('prix_vente', 8, 2);
            $table->bigInteger('quantite');
            $table->unsignedBigInteger('conditionnement_id');
            $table->timestamps();

            $table->foreign('bon_livraison_id')->references('id')->on('bon_livraisons');
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
        Schema::dropIfExists('detail_bon_livraisons');
    }
};
