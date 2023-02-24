<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tarjeta extends Model
{
    use HasFactory;
    protected $table = 'tarjetas'; // -> Indicar la Tabla
    protected $primaryKey = 'num_tarjeta'; // -> Indicar la Clave Primaria
    protected $fillable = ['num_tarjeta','mes_caducidad','anyo_caducidad','cvv','titular','id_cliente']; //Indicar los campos que son rellenables

    public function cliente(){
        return $this->belongsTo(User::class, 'id_cliente', 'id' );
    }
}
