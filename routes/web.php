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


Route::resource('employees', 'EmployeeController');
Route::resource('fournisseurs', 'FournisseurController');
Route::resource('categories', 'CategorieController');
Route::resource('materiaux', 'MaterielController');
Route::resource('affectations', 'AffectationController');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
