<?php

use Illuminate\Support\Facades\Route;

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

<<<<<<< HEAD
Route::get('', function () {
    return view('welcome');
});

$groupData = [
    'namespace' => 'Admin',
    'prefix' => 'admin/',
    'middleware' => \App\Http\Middleware\checkAdmin::class
];
Route::group($groupData, function(){
    Route::resource('market','MarketController');
    Route::resource('instrument', 'InstrumentController');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
=======
Route::get('/', function () {
    return view('welcome');
});
>>>>>>> 2a58854387a6305906244938b40db8e53d1801a1
