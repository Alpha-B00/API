<?php

namespace App\Http\Controllers;

use App\Models\Horario;
use Illuminate\Http\Request;

class CalendarioController extends Controller
{
    public function events(){
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

    public function ajaxTime(Request $request){
        switch($request->type){
            case 'showHours':
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
            break;
        }
    }
}
