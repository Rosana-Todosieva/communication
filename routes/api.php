<?php

use App\Http\Controllers\ServerController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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


// Create a channel
Route::post('/channels', 'ChannelController@store');

// List all channels
Route::get('/channels', 'ChannelController@index');

// Fetch messages within a channel
Route::get('/channels/{channel}/messages', 'MessageController@index');

Route::resource('servers', ServerController::class);


