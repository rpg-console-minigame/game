<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tienda extends Model
{
    use HasFactory;

    protected $table = 'tienda';

    protected $primaryKey = 'id';

    protected $fillable = [
        'nombre',
        'descripcion',  
        'precio_oro'
    ];
}
