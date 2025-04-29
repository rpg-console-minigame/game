<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Objeto extends Model
{
    use HasFactory;

    protected $table ='objeto';
    
    protected $primary = 'id';

    // Schema::create('objeto', function (Blueprint $table) {
    //     $table->id();
    //     $table->unsignedBigInteger('zona_ID')->nullable();
    //     $table->foreign('zona_ID')->references('id')->on('zona')->nullable();
    //     $table->unsignedBigInteger('personaje_ID')->nullable();
    //     $table->foreign('personaje_ID')->references('id')->on('personaje')->nullable();
    //     $table->string('nombre');
    //     $table->string('descripcion')->nullable();
    //     $table->integer('coste' )->nullable();
    //     $table->integer('durabilidad')->nullable();
    //     $table->string('function_name')->nullable();
    //     $table->timestamps();
    // });
    protected $fillable = [
        'nombre',
        'coste',
        'descripcion',
        'function_name',
        'durabilidad',
        'zona_ID',
        'personaje_ID'
    ];
    public function Zona(){
        return $this->hasOne('zona');
    }
}
