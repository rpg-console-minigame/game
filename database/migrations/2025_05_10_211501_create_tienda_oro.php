<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('tienda_oro', function (Blueprint $table) {
            $table->id();
            $table->string('nombre');
            $table->string('img_url');
            $table->integer('cantidad_oro');
            $table->decimal('precio', 8, 2);
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('tienda_oro');
    }
};
