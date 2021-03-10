<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Models\Level;
use App\Http\Controllers\EleveController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

// Route::get('eleves/niveau/{juzz}',function($juzz){
//     return Level::select('titre')->where('id','=',$juzz)->get();
// });
Route::get('eleves/niveau',[EleveController::class,'niveau']);