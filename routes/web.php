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
Route::post('/CompteModif', 'CompteController@update')->name('CompteModif');
Route::post('/Reserver', 'ReservationController@reserver')->name('Reserver');
Route::post('/Commander', 'CommandeController@commander')->name('Commander');
Route::post('/ModifierCommande/{id}', 'CommandeController@show')->name('ModifierCommande');
Route::post('/Modifier/{id}', 'CommandeController@update')->name('Modifier');
Route::POST('/delete/{id}', 'CommandeController@delete')->name('AnnulerCommande');
Route::POST('/detail', 'CommandeController@detail')->name('DetailCommande');


Route::get('/', function () {
    return view('welcome');
});

Auth::routes();
Route::get('/Menu', 'MenuController@show')->name('Menu');

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/Compte', 'CompteController@show')->name('Compte');
Route::get('/Reservation', function () {
    return view('pages.Reservation.Reservation');
})->name('Reservation');
