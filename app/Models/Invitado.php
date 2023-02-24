<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Invitado extends Model
{
    use HasFactory;
    protected $table = 'invitados'; // -> Indicar la Tabla
    protected $primaryKey = 'id'; // -> Indicar la Clave Primaria
    protected $fillable = ['email','nombre','apellidos','phone']; //Indicar los campos que son rellenables
}
