<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTiendaOroTable extends Migration
{
    public function up()
    {
        Schema::create('tienda_oro', function (Blueprint $table) {
            $table->id();
            $table->string('nombre');
            $table->integer('cantidad_oro');
            $table->decimal('precio', 8, 2);
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('tienda_oro');
    }
}
