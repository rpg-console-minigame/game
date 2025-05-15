<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TiendaOro extends Model
{
    use HasFactory;

    protected $table = 'tienda_oro';

    protected $primaryKey = 'id';

    protected $fillable = [
        'nombre',
        'cantidad_oro',
        'precio',
    ];
}
