<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Adminstrador extends Model
{
    use HasFactory;
    protected $table = 'invitado'; // -> Indicar la Tabla
    protected $primaryKey = 'id'; // -> Indicar la Clave Primaria
    protected $fillable = ['email','email','password','nombre','apellidos'];
}
