<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;

class TerceroController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($id)
    {
        $cuentas = DB::table('cuentas')->where('id_user','=',$id)->get();
        return view('tercero')->with('cuentas',$cuentas);
    }


    public function propia($id)
    {
        //$cuentaOrigen = DB::table('cuentas')->find($id);
        $externas = DB::table('cuentas')
        ->select('externas.*')
        ->join('cue_exts','cuentas.id','=','cue_exts.id_cuenta')
        ->join('externas','cue_exts.id_externa','=','externas.id')
        ->where('cue_exts.id_cuenta',$id)->get();
        //$cuentaDestino = DB::table('externas')->find($id);
        dd($externas);
        return view('cuentaexterna')->with('externas',$externas)->with('id',$id);
    }

    public function cuentaExterna(Request $request)
    {
        $externas = DB::table('cuentas')
        ->select('externas.*')
        ->join('cue_exts','cuentas.id','=','cue_exts.id_cuenta')
        ->join('externas','cue_exts.id_externa','=','externas.id')
        ->where('cue_exts.id_cuenta',$request->origen)->get();
        //$cuentaDestino = DB::table('externas')->find($id);
        return view('cuentaexterna')->with('externas',$externas)->with('idOrigen',$request->origen);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $cuentaOrigen = DB::table('cuentas')->find($request->idOrigen);
        $cuentaDestino = DB::table('externas')->find($request->destino);
        $control = true;
        $mensajeError = "";
        ///dd($cuentaOrigen);
        //dd($cuentaDestino);

        if($request->monto <= 0){
            $control = false;
            $mensajeError .= "El monto de transferencia debe ser superior a CERO</br>";
        }
        if($cuentaOrigen->habilitada != 'V'){
            $control = false;
            $mensajeError .= "La cuenta ORIGEN no está habilitada</br>";
        }
        if($cuentaDestino->habilitada != 'V'){
            $control = false;
            $mensajeError .= "La cuenta DESTINO no está habilitada</br>";
        }
        if($cuentaOrigen->monto < $request->monto ){
            $control = false;
            $mensajeError .= "El monto supera el saldo de la cuenta origen</br>";
        }
        
        if($control == true){
            $valorOrigen = $cuentaOrigen->monto - $request->monto;
            $valorDestino = $cuentaDestino->monto + $request->monto;

            DB::table('cuentas')->where('id',$request->idOrigen)
            ->update(['monto'=>$valorOrigen]);
            DB::table('externas')->where('id',$request->destino)
            ->update(['monto'=>$valorDestino]);
            
            DB::table('transferencias')->insert([
                'cuenta_origen' => $cuentaOrigen->cuenta,
                'cuenta_destino' => $cuentaDestino->cuenta,
                'tipo_cuenta' => "Terceros",
                'monto' => $request->monto,
                'id_origen' => $request->idOrigen,
                'id_destino' => $request->destino
            ]);
            
        }
        echo("<h2 class='alert alert-danger'>".$mensajeError."<h2>");
        //return ($mensajeError);
        $transacciones = DB::table('transferencias')->get();
        return view('lista')->with('transacciones',$transacciones);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
