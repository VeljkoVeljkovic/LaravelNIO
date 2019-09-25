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
Route::get('home', function () {
    return view('home');
});

Route::resource('pozivi', 'PoziviKontroler');




Route::resource('pitanjapoziv', 'PitanjaPoziviKontroler');





// Projekat rute


// Vrsi se filter pretraga projekata
Route::post('/projekatpretraga', 'ProjekatKontroler@pretragaProjakata');


Route::resource('projekat', 'ProjekatKontroler');


Route::resource('recenzent', 'RecenzentKontroler');


Auth::routes();


