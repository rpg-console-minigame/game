<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Enemigo extends Model
{
    use HasFactory;

    protected $table ='enemigo';
    
    protected $primary = 'id';

    protected $fillable = [
        'nombre',
        'ataque',
        '%soltar',
        'objeto_ID',
        'zona_ID'
    ];
    
    public function Objeto(){
        return $this->hasOne('objeto');
    }

    public function Zona(){
        return $this->hasOne('zona');
    }
}
