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
//Route::middleware(['web'])->group(function () {
Route::group(['middleware' => ['web']], function () {
    Route::get('/', function () {
//        return view('welcome');
        //return dd(app(Illuminate\Contracts\Config\Repository));
//        return dd(\Illuminate\Support\Facades\Config::all());
//        return dd(app('config'));
        return dd(app()['config']);
        });
Route::get('/cards', 'CardsController@index');
});
Route::get('/cards/{card}', 'CardsController@show');
Route::get('/users/{user}' , function(\App\User $user){
    return $user;
});
Route::post('/cards/{card}/notes', 'NotesController@store');
Route::get('/notes/{note}/edit', 'NotesController@edit');
Route::patch('notes/{note}', 'NotesController@update');
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
