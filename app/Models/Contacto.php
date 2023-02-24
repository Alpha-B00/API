<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Contacto extends Model
{
    use HasFactory;

    protected $table = 'contacto'; // -> Indicar la Tabla
    protected $primaryKey = 'id'; // -> Indicar la Clave Primaria
    protected $fillable = ['nombre','asunto','email','mensaje']; //Indicar los campos que son rellenables

}
