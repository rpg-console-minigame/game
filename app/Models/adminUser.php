<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class adminUser extends Model
{
    use HasFactory;

    protected $table ='adminUser';
    
    protected $primary = 'id';

    protected $fillable = [
        'name',
        'password'
    ];
}
