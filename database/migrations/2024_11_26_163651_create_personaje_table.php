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
        Schema::create('personaje', function (Blueprint $table) {
            $table->id();
            $table->string('nombre');
            $table->integer('HP');
            $table->integer('Max HP');
            $table->unsignedBigInteger('users_ID');
            $table->foreign('users_ID')->references('id')->on('users');
            $table->integer('Dinero');
            $table->unsignedBigInteger('zona_ID');
            $table->foreign('zona_ID')->references('id')->on('zona');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('persona');
    }
};
