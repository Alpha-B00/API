<?php

namespace App\Http\Controllers;

use App\Models\Tarjeta;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TarjetaController extends Controller
{
    public function show(){
        $result=Tarjeta::select('num_tarjeta','mes_caducidad','anyo_caducidad','cvv','titular')
        ->where('id_cliente', Auth::user()->id)
        ->get();
        return view('metodos-pago') -> with('result',$result);
    }
}
