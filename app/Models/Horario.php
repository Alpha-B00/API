<?php

namespace App\Models;

use App\Models\Reserva;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Horario extends Model
{
    use HasFactory;

    protected $table = 'horarios'; // -> Indicar la Tabla
    protected $primaryKey = 'id'; // -> Indicar la Clave Primaria
    protected $fillable = ['fecha','hora','estado']; //Indicar los campos que son rellenables

       public function reserva(){
        return $this->hasOne(Reserva::class, 'fecha_reserva', 'id' );
    }
}
