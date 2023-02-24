<?php

namespace App\Http\Controllers;
use App\Models\Menu;
use App\Models\Mesa;
use App\Models\User;
use App\Models\Horario;
use App\Models\Reserva;
use App\Models\Tarjeta;
use App\Models\Invitado;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class ReservaController extends Controller
{
    public $id_fecha;

    public function reserva()
    {
        $dias = Horario::all();
        return view('reservas') -> with('dias',$dias);
    }

    public function reserva3($idFecha)
    {
        $horarios = DB::table('horarios')
        ->where('id','=',$idFecha)
        ->get();
        
       $idHorario = $idFecha;
       $mesas = Mesa::all();
       $tarjeta = Tarjeta::all();
       $menu = Menu::all();
     
       return view('reservas3',['horarios'=>$horarios, 'idHorario'=>$idHorario,'mesas'=>$mesas, 'tarjera'=>$tarjeta, 'menu'=>$menu]);
    }

    public function mostrar(Request $request)
    {
       return view('reservas-panel-control')->with('reservas',Auth::user()->reservas);
    }
    
    public function store(Request $request)
    {

        $this->validate($request,[
            'email' => 'required|email|min:5|max:50',
            'nombre' => 'required|string|min:5|max:50',
            'apellidos' => 'required|string|min:4|max:50',
            'titular' => 'required|string|min:20|max:50',
            'telefono' => 'required|integer|digits:9',
            'num_tarjeta' => 'required|integer|digits:16',
            'cvv' => 'required|integer|digits:3'
        ]);

        if(!Auth::user()){
            $invitado = Invitado::create([
                'email' => $request->post('email'),
                'nombre'=> $request->post('nombre'),
                'apellidos'=> $request->post('apellidos'),
                'phone'=> $request->post('telefono'),
            ]);
            
            Reserva::create([
                'fecha_reserva' => $request->post('fecha_reserva'),
                'id_invitado' => $invitado->id,
                'id_menu' => $request->post('menu'),
                'id_mesa' => $request->post('comensales'),
                'num_tarjeta' => $request->post('num_tarjeta'),
                'num_persona' => 4,
            ]);
            $horario= Horario::find($request->post('fecha_reserva'));
            $horario->update(['estado' => 'no-disponible']);
        }else{
            
            Tarjeta::create([
                'num_tarjeta' => $request->post('num_tarjeta'),
                'mes_caducidad' => $request->post('mes-caducidad'),
                'anyo_caducidad' => $request->post('ano-caducidad'),
                'cvv' => $request->post('cvv'),
                'titular' => $request->post('titular'),
                'id_cliente' => Auth::user() -> id,    
            ]);

            Reserva::create([
                'fecha_reserva' => $request->post('fecha_reserva'),
                'id_cliente' => Auth::user()->id,
                'id_menu' => $request->post('menu'),
                'id_mesa' => $request->post('comensales'),
                'num_tarjeta' => $request->post('num_tarjeta'),
                'num_persona' => 4,
            ]);
            $horario= Horario::find($request->post('fecha_reserva'));
            $horario->update(['estado' => 'no-disponible']);
        }
        return view('reserva-confirmada') -> with('mensaje',$request->apellidos);
    }

    public function eliminar($id_reserva)
    {   

        $horarios = DB::table('reservas')
        ->where('id','=',$id_reserva)
        ->get();

    

        $horario= Horario::find($horarios[0] -> fecha_reserva);
        $horario->update(['estado' => 'disponible']);;

        $reserva = Reserva::find($id_reserva);
/* Deleting the reservation. */
        $reserva -> delete();
      
       return view('reservas-panel-control') -> with('mensaje',"La Reserva se ha borrado correcamente");
    }
}
