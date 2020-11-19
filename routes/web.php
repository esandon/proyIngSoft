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

Route::get('/get-all-estudiante','EstudianteController@getAllEstudiante');


Route::get('import-excel', 'ImportExcel\ImportExcelController@index');

Route::post('import-excel', 'ImportExcel\ImportExcelController@import');


Route::get('import-excelA', 'ImportExcel\ImportExcelControllerA@index');

Route::post('import-excelA', 'ImportExcel\ImportExcelControllerA@import');