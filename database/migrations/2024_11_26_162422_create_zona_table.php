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
        Schema::create('zona', function (Blueprint $table) {
            $table->id();
            $table->string('nombre');
            $table->longText('imagen');
            $table->longText('descripcion');
            $table->boolean('up_door');
            $table->boolean('down_door');
            $table->boolean('left_door');
            $table->boolean('right_door');
            $table->integer('coord_x');
            $table->integer('coord_y');
            $table->boolean('isSpawn')->default('0');
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
        Schema::dropIfExists('zona');
    }
};
