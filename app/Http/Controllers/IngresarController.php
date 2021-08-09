<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class IngresarController extends Controller
{

    public function setId($id)
    {
        $this->id = $id;
    }

    public function getId()
    {
        return $this->id;
    }
    

    public function index()
    {
        return view('ingresar');
    }

    public function store(Request $request)
    {
        //$control = false;
        $usuarios = DB::table('users')->get();
        //echo ($usuarios[0]->cedula);
        
        foreach($usuarios as $usuario){
            if(($usuario->cedula == $request->cedula) and
                 ($usuario->password == $request->password)){
                     echo("Coincide cédula: $usuario->cedula y $usuario->password" );
                    return view('inicio')->with('usuario',$usuario);
            }
        }

        echo("Error al ingresar: Usuario y/o contraseña errada");
        return view('ingresar');

        //dd($request->all());
        //return view('inicio');
    }
}
