<?php

use Illuminate\Support\Facades\Route;


Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


// Route::get('/passport', 'PassportController@index');
// Route::get('passport/create', 'PassportController@create');
// Route::post('passport', 'PassportController@store')->name('passport');
// Route::put('passprt', 'PassportController@update');
// Route::delete('passport', 'PassportController@delete');


Route::resource('passport', 'PassportController')->middleware('auth');
Route::resource('company', 'CompanyController');