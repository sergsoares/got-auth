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

Route::get('/', 'ListController@show');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/got', [
    'middleware' => ['auth'],
    'uses' => function() {
        echo 'You are allowed to view this page!';
    }
]);

Route::get('/chars', function() {
    echo 'You are authenticated in chars.';
})->middleware('auth');


Route::group(['middleware' => ['auth']], function () {
    Route::get('/persons', function(){
        echo 'You are Authenticated in Persons';
    });
});
