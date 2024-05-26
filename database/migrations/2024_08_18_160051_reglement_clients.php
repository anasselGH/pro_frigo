<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('reglement_clients', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->date('date');
            $table->double('montant', 8, 2);
            $table->unsignedBigInteger('mode_reglement_id');
            $table->text('observation');
            $table->unsignedBigInteger('client_id');
            $table->timestamps();

            $table->foreign('mode_reglement_id')->references('id')->on('mode_reglements');
            $table->foreign('client_id')->references('id')->on('clients');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('reglement_clients');
    }
};
