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
Route::post('/cuenta',[CuentaController::class,'store'])->name('cuentastore');
Route::get('/lista',[ListaController::class,'index'])->name('lista');
Route::get('/tercero/{id}',[TerceroController::class,'index'])->name('tercero');
Route::post('/tercero',[TerceroController::class,'store'])->name('tercerostore');
Route::post('/cuentaexterna',[TerceroController::class,'cuentaExterna'])->name('cuentaexterna');
//Route::get('/propia/{id}',[TerceroController::class,'index'])->name('propia');

Auth::routes();