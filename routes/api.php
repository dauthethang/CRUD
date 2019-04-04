<?php

use Illuminate\Http\Request;
use app\Share;
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
Route::get('shares', 'ShareApiController@index');
Route::get('shares', 'ShareApiController@show');
Route::post('shares', 'ShareApiController@store');
Route::put('shares', 'ShareApiController@supdate');
Route::delete('shares', 'ShareApiController@destroy');
Route::apiResources([
    'shares' => 'API\ShareApiController'
]);

