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
    ];
    public function Users(){
        return $this->hasOne('users');
    }

    public function Zona(){
        return $this->hasOne('zona');
    }
}
