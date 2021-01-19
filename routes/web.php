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
    return view('home');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Auth::routes();

Route::get('importE', 'ImportExcel\ImportExcelEstudianteController@index');

Route::post('importE', 'ImportExcel\ImportExcelEstudianteController@import');

Route::get('importA', 'ImportExcel\ImportExcelAsignaturaController@index');

Route::post('importA', 'ImportExcel\ImportExcelAsignaturaController@import');



// ------------------------ delete ------------------------- //
Route::get('importE/{importID}','ImportExcel\ImportExcelEstudianteController@importDelete')->name('importDelete');
// ------------------------ insert ------------------------ //
Route::post('importInsert','ImportExcel\ImportExcelEstudianteController@importInsert')->name('importInsert');
// ------------------------ update ------------------------ //

Route::post('importUpdate','ImportExcel\ImportExcelEstudianteController@importUpdate')->name('importUpdate');

Route::get('importE','ImportExcel\ImportExcelEstudianteController@index');
Route::post('importE/update','ImportExcel\ImportExcelEstudianteController@update');






Route::post('importInsert','ImportExcel\ImportExcelController@importInsert')->name('importInsert');

Route::post('importUpdate','ImportExcel\ImportExcelController@importUpdate')->name('importUpdate');

Route::resource('estudiante', 'EstudianteController');

Route::resource('usuario','UserController');

Route::resource('import_excel', 'ImportExcel\ImportExcelController');

Route::get('atencion', 'AtencionController@index')->name('registroAtencion');
Route::post('atencion', 'AtencionController@store')->name('registrarAtencion');

Route::get('/usuarios','UserController@index');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
