<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Objeto extends Model
{
    use HasFactory;

    protected $table ='objeto';
    
    protected $primary = 'id';

    protected $fillable = [
        'nombre',
        'coste',
        'descripcion',
        'function_name',
        'durabilidad',
        'zona_ID'
    ];
    public function Zona(){
        return $this->hasOne('zona');
    }
}
