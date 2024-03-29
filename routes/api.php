<?php

use App\Http\Controllers\SalesController;
use Illuminate\Http\Request;

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

Route::middleware('auth:api')->get('/user', function (Request $request){
    return $request->user();
});
Route::group(['middleware' => ['auth:api']], function(){
    Route::resource('sales', 'SalesController');
    Route::resource('users', 'UserController');
});
Route::get('agreement/{id}', 'SalesController@downloadAgreement');
Route::options('sales', function(){
    return response()->json([]);
});
Route::options('sales/{any?}', function(){
    return response()->json([]);
});

