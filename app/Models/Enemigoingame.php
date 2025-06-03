<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Enemigoingame extends Model
{
    use HasFactory;
    protected $table = 'enemigoingame';
    protected $fillable = [
        'nombre',
        'tipo',
        'descripcion',
        'ataque',
        '%soltar',
        'objeto_ID',
        'zona_ID',
    ];
    protected $casts = [
        'objeto_ID' => 'integer',
        'zona_ID' => 'integer',
    ];
    public function objeto()
    {
        return $this->belongsTo(Objeto::class, 'objeto_ID');
    }
    public function zona()
    {
        return $this->belongsTo(Zona::class, 'zona_ID');
    }
    public function personaje()
    {
        return $this->belongsTo(Personaje::class, 'personaje_ID');
    }
}
