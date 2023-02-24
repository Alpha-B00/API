<?php

namespace App\Http\Controllers\Api;


use App\Models\Menu;
use App\Models\Mesa;
use App\Models\Horario;
use App\Models\Reserva;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;

class ReservaApiController extends Controller
{
    public function consultarReservas(Request $request){
        $reservas = DB::table('reservas')
        ->where('id_cliente','=',$request -> id_cliente)
        ->get();

        return response()->json($reservas);
    }

    public function insertarReserva(Request $request){

        try {
            //Validated
            $validarCampos = Validator::make($request->all(),
            [
                'id_cliente' => 'required',
                'menu' => 'required',
                'id_mesa' => 'required',
                'num_tarjeta' => 'required',
                'fecha_reserva' => 'required',
                'comensales' => 'required',
                'titular' => 'required',
                'cvv' => 'required',
            ]);

            if($validarCampos->fails()){
                return response()->json([
                    'status' => false,
                    'message' => 'validation error',
                    'errors' => $validarCampos->errors()
                ], 401);
            }

            $reserva = Reserva::create([
                'id_cliente' => $request -> id_cliente,
                'id_invitado' => $request ->id_invitado,
                'id_menu' => $request -> menu,
                'id_mesa' => $request -> id_mesa,
                'num_tarjeta' => $request -> num_tarjeta,
                'fecha_reserva' => $request -> fecha_reserva,
                'num_persona' => $request -> comensales,
            ]);

            return response()->json([
                'status' => true,
                'message' => 'Reserva Creada Correctamente',
            ], 200);

        } catch (\Throwable $th) {
            return response()->json([
                'status' => false,
                'message' => $th->getMessage()
            ], 500);
        }
    }

    public function actualizarReserva(){
        
         return response()->json($data) ; 
    }

    public function borrarReserva(Request $request){
        try {
            //Validated
            $validarCampos = Validator::make($request->all(),
            [
                'id' => 'required',
            ]);

            if($validarCampos->fails()){
                return response()->json([
                    'status' => false,
                    'message' => 'validation error',
                    'errors' => $validarCampos->errors()
                ], 401);
            }

            /*$reserva = DB::table('reservas')
            ->where('id','=',$request -> id)
            ->get();*/

            $reserva = DB::delete("delete from reservas where id='$request->id'");
    

            if($reserva == 0){
                return response()->json([
                    'status' => false,
                    'message' => 'El ID de Reserva introducido no existe',
                ], 200);
            }else{
                return response()->json([
                    'status' => true,
                    'message' => 'Reserva Borrada Correctamente',
                ], 200);
            }
            

        } catch (\Throwable $th) {
            return response()->json([
                'status' => false,
                'message' => $th->getMessage()
            ], 500);
        }
    }

    public function consultarFechas(){
        $result=Horario::select('fecha')
        ->where('estado','disponible')
        ->groupBy('fecha')
        ->get();

        $data=array();
        foreach($result as $row)
        {
            $data[] = array(
                'id' => $row["id"],
                'title' => "",
                'start' => $row["fecha"],
                'end' => $row["fecha"]
            );
        }
         return response()->json($data) ; 
    }

     public function consultarHoras(Request $request){
        $result=Horario::where([
            ['fecha', '=', $request->get('fecha')],
            ['estado', '=', 'disponible'],
        ])->get();
            
        $horas=array();
        
        foreach($result as $row){
            $horas[] = array(
                'id' => $row->id,
                'hora' => date('H:i', strtotime($row->hora)),
            );
        }
        return response()->json($horas);
    }

    public function obtenerMesas(){
        $mesas = Mesa::all();
        return response()->json($mesas);
    }

    public function obtenerMenus(){
        $menus = Menu::all();
        return response()->json($menus);
    }
    
}
