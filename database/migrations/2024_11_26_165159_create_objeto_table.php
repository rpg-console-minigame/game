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
        Schema::create('objeto', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('zona_ID');
            $table->foreign('zona_ID')->references('id')->on('zona');
            $table->string('nombre');
            $table->string('descripcion')->nullable();
            $table->integer('coste' )->nullable();
            $table->integer('durabilidad')->nullable();
            $table->string('function_name');
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
        Schema::dropIfExists('objeto');
    }
};
