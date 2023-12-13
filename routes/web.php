<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PizzaController;
use App\Http\Controllers\HomeController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get("/pizzas", [PizzaController::class,'index']);
Route::post('pizzas/create',[PizzaController::class,'store']);
Route::get('pizzas/create',[PizzaController::class,'create']);
Route::delete('/pizzas/{id}',[PizzaController::class,'destroy']);
Route::get('/pizzas/{id}', [PizzaController::class,'show']);
Auth::routes();

Route::get('/home',[HomeController::class,'index'])->name('home');
