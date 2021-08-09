<?php

namespace App\Http\Controllers;

use App\Models\User as User;
use Hamcrest\Core\HasToString;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CuentaController extends Controller
{

    /**
     * Display a listing of the resource.
     * 
     * @return \Illuminate\Http\Response
     * 
     */
    public function index($id)
    {  
        $cuentas = DB::table('cuentas')->where('id_user','=',$id)->get();
        $users = DB::table('users')->find($id);
        return view('cuenta')->with('cuentas',$cuentas)->with('users',$users);
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
        $cuentaOrigen = DB::table('cuentas')->find($request->origen);
        $cuentaDestino = DB::table('cuentas')->find($request->destino);
        $control = true;
        $mensajeError = "";

        if($request->origen == $request->destino){
            $control = false;
            $mensajeError .= "No puedes hacer transferencia entre la misma cuenta.</br>";
        }
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

            DB::table('cuentas')->where('id',$request->origen)
            ->update(['monto'=>$valorOrigen]);
            DB::table('cuentas')->where('id',$request->destino)
            ->update(['monto'=>$valorDestino]);
            
            DB::table('transferencias')->insert([
                'cuenta_origen' => $cuentaOrigen->cuenta,
                'cuenta_destino' => $cuentaDestino->cuenta,
                'tipo_cuenta' => "Propia",
                'monto' => $request->monto,
                'id_origen' => $request->origen,
                'id_destino' => $request->destino
            ]);
            
        }
            echo($mensajeError);

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
