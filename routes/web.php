<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\EleveController;
use App\Http\Controllers\TuteurController;
use App\Http\Controllers\InscriptionController;
use App\Http\Controllers\MensualiteController;
// use App\Http\Controllers\CorantableController;

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
    return view('layout.master');
});

Route::middleware('auth')->group(function () {
Route::resource('eleves',EleveController::class);
Route::resource('tuteurs',TuteurController::class);
Route::resource('mensualites',MensualiteController::class);
Route::resource('tuteurs.eleves', EleveController::class);
Route::resource('eleves.mensualites', MensualiteController::class);
});