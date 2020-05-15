<?php

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

// Route::middleware('auth:api')->get('/user', function (Request $request) {
//     return $request->user();
// });

Route::group([
  'prefix' => 'auth'
], function () {
  Route::post('login', 'AuthController@login');
  Route::post('register', 'AuthController@register');

  Route::group([
    'middleware' => 'auth:api'
  ], function() {
      Route::get('logout', 'AuthController@logout');
      Route::get('user', 'AuthController@user');
  });

});



Route::resource('users', 'UserAPIController');

Route::resource('ramos', 'RamoAPIController');

Route::resource('produtos', 'ProdutoAPIController');

Route::resource('coops', 'CoopAPIController');

Route::resource('canais', 'CanaisAPIController');

Route::resource('coop_produtos', 'CoopProdutoAPIController');

Route::get('pesquisa', 'CoopAPIController@pesquisa');
Route::post('enviar-coop', 'CoopAPIController@crud');


Route::resource('coop_canais', 'CoopCanaisAPIController');

Route::resource('areas', 'AreaAPIController');
