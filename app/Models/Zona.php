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
        'imagen',
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

    public function hasUpDoor()
    {
        return $this->up_door && $this->zonaExists($this->coord_x-1, $this->coord_y);
    }

    public function hasDownDoor()
    {
        return $this->down_door && $this->zonaExists($this->coord_x+1, $this->coord_y);
    }

    public function hasLeftDoor()
    {
        return $this->left_door && $this->zonaExists($this->coord_x, $this->coord_y - 1);
    }

    public function hasRightDoor()
    {
        return $this->right_door && $this->zonaExists($this->coord_x, $this->coord_y + 1);
    }

    private function zonaExists($x, $y)
    {
        return self::where('coord_x', $x)->where('coord_y', $y)->exists();
    }
}