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

Route::get('/welcome', function () {
    return view('welcome');
});

Route::get('/hi', function () {
    return 'hi';
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/', 'ProdutoController@lista')->middleware('auth');

Route::get('/produtos/mostra/{id}', 'ProdutoController@mostra')->where('id', '[0-9]+')->middleware('auth');// if i don't put where clausule, can I have reoutes trouble

Route::get('/produtos/remove/{id}', 'ProdutoController@remove')->where('id', '[0-9]+')->middleware('auth');

Route::get('produtos/novo', 'ProdutoController@novo')->middleware('auth');

Route::post('produtos/adiciona', 'ProdutoController@adiciona')->middleware('auth');

Route::get('produtos/getjson', 'ProdutoController@getJson')->middleware('auth'); 