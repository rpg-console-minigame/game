<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class objetoInGame extends Model
{
    use HasFactory;
    protected $table ='objetoingame';
    
    protected $primary = 'id';

    protected $fillable = [
        'nombre',
        'coste',
        'descripcion',
        'function_name',
        'durabilidad',
        'minutos',
        'zona_ID',
        'personaje_ID',
    ];
    public function Zona(){
        return $this->hasOne('zona');
    }
    public function Personaje(){
        return $this->hasOne('personaje');
    }
}
