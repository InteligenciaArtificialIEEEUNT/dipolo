<?php

use App\Http\Controllers\RubroController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('admin-area');
});


Route::get('/rubros', [RubroController::class, 'index']);

Route::get('/rubros/actualizar/{id}', [RubroController::class, 'actualizar'])->name('rubros.actualizar');