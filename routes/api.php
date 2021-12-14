<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\API\TicTacApiController;
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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});


Route::post('newGame',[TicTacApiController::class, 'new_game'])->name('newgame');
Route::put('playMove/{game}', [TicTacApiController::class, 'play_move'])->name('playmove');
// Route::delete('game/{game}', 'Api@destroy');