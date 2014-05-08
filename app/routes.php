<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/

Route::resource('gamintojai', 'GamintojaiController');
Route::resource('savininkai', 'SavininkaiController');
Route::resource('automodeliai', 'AutomodeliaiController');
Route::resource('tech_apziura', 'TechApziuraController');
Route::resource('registruoti_auto', 'RegistruotiAutoController');
Route::resource('imokos', 'ImokosController');
Route::resource('imokos_uz_auto', 'ImokosUzAutoController');

