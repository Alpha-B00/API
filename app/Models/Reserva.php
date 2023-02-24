<?php

namespace App\Models;

use App\Models\Horario;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Reserva extends Model
{
    use HasFactory;

    protected $table = 'reservas'; // -> Indicar la Tabla
    protected $primaryKey = 'id'; // -> Indicar la Clave Primaria
    protected $fillable = ['id_cliente','id_invitado','id_menu','id_mesa','num_tarjeta','fecha_reserva','num_persona']; //Indicar los campos que son rellenables

   public function horario(){
        return $this->belongsTo(Horario::class, 'fecha_reserva', 'id' );
    }

       public function cliente(){
        return $this->belongsTo(User::class, 'id_cliente', 'id' );
    }

}
