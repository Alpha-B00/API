<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Menu extends Model
{
    use HasFactory;
    protected $table = 'menu'; // -> Indicar la Tabla
    protected $primaryKey = 'id'; // -> Indicar la Clave Primaria
    protected $fillable = ['nombre','precio']; //Indicar los campos que son rellenables
}
