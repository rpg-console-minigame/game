<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Personaje extends Model
{
    use HasFactory;

    protected $table ='personaje';
    
    protected $primary = 'id';

    protected $fillable = [
        'nombre',
        'HP',
        'Max_HP',
        'dinero',
        'users_ID',
        'zona_ID'
    ];
    public function Users(){
        return $this->hasOne('users');
    }

    public function Zona(){
        return $this->hasOne('zona');
    }
    
    public function objetosInGame()
    {
        return $this->hasMany(ObjetoInGame::class, 'personaje_ID');
    }

}
