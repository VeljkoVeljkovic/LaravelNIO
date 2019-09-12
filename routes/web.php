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
Route::get('/pozivi/{id}', 'PoziviKontroler@show');

Route::resource('pozivi', 'PoziviKontroler');

Route::post('/pozivi/submit', 'PoziviKontroler@submit');

Route::post('/dodaj', 'PitanjaPoziviKontroler@dodaj');

Route::post('/obrisi', 'PitanjaPoziviKontroler@obrisi');

// Projekat rute
 //Stranica sa svim projketima gde se vrsi i pretraga preko filtera

Route::get('/sviprojekti', 'ProjekatKontroler@total');

// Vrsi se filter pretraga projekata
Route::post('/projekatpretraga', 'ProjekatKontroler@pretragaProjakata');


Route::resource('projekat', 'ProjekatKontroler');
Route::post('/p', 'ProjekatKontroler@store');

Route::resource('recenzent', 'RecenzentKontroler');


Auth::routes();

Route::get('/pozivi', 'PoziviKontroler@index');
