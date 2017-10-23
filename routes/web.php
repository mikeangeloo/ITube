<?php

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
    return view('welcome');
});

Auth::routes();


Route::get('/home', 'HomeController@index')->name('home');
Route::get('/tube_types', 'Tubes_TypesController@select_allTubeTypes');
Route::get('/tubes/{id}', 'TubesController@selectTubes');
Route::get('/cables_types', 'Cable_TypesController@selectAllCableTypes');
Route::get('/cables/{id}', 'CablesController@selectCables');
Route::get('/cablesdiameter/{id}','CablesController@getCableDiameter');

Route::post('calcular',[
    'as' => 'ProyectsController.calcularTrayectoria',
    'uses' => 'ProyectsController@calcularTrayectoria'
]);
