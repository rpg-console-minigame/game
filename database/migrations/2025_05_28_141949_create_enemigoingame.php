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
        Schema::create('enemigoingame', function (Blueprint $table) {
            $table->id();
            $table->string('nombre');
            $table->string('tipo');
            $table->string('descripcion')->nullable();
            $table->integer('ataque');
            $table->integer('%soltar')->default(0);
            $table->unsignedBigInteger('objeto_ID')->nullable();
            $table->foreign('objeto_ID')->references('id')->on('objeto')->nullable();
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
        //
    }
};
