<?php

use App\Http\Controllers\CuentaController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\IngresarController;
use App\Http\Controllers\ListaController;
use App\Http\Controllers\TerceroController;
use Illuminate\Routing\Route as RoutingRoute;
use Illuminate\Support\Facades\Auth;
use PhpParser\Node\Expr\Ternary;
use Symfony\Component\Routing\Annotation\Route as AnnotationRoute;

/*
Route::get('/', function () {
    return view('welcome');
});*/

Route::get('/',[IngresarController::class,'index'])->name('index');
Route::post('/inicio',[IngresarController::class,'store'])->name('inicio');
Route::get('/cuenta/{id}',[CuentaController::class,'index'])->name('cuenta');
Route::get('/tercero/{id}',[TerceroController::class,'index'])->name('tercero');
Route::post('/cuenta',[CuentaController::class,'store'])->name('cuentastore');
Route::post('/tercero',[TerceroController::class,'store'])->name('tercerostore');
Route::get('/listaGeneral',[ListaController::class,'indexGeneral'])->name('listaGeneral');

Auth::routes();