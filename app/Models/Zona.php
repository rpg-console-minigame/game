<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Zona extends Model
{
    use HasFactory;

    protected $table ='zona';
    
    protected $primary = 'id';

    protected $fillable = [
        'nombre',
        'ruta_IMG',
        'descripcion',
        'up_door',
        'down_door',
        'left_door',
        'right_door',
        'coord_x',
        'coord_y',
        'isSpawn'
    ];
    public function Zona(){
        return $this->hasOne('zona');
    }
}
