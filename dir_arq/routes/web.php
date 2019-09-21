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

Route::get('/', ['uses'=>'Painel\userController@getIndex']);


Route::prefix('controller')->group(function () {
    Route::get('/processo/{nucleo}/{pontecia}/{dificuldade}/{refUser}/{id_user}/{status}', ['uses'=>'Painel\userController@retornCarregamentoFaucet']);
    Route::get('/validar/{dificuldade}/{id_user}/{token01}/{token02}/{nucleo}/{pontecia}/{refUser}', ['uses'=>'Painel\userController@getValidarTokens']);
    Route::get('/processo/{nucleo}/{pontecia}/{dificuldade}/{refUser}/{id_user}', ['uses'=>'Painel\userController@getProcessoMiner']);
    Route::get('/auto/{dificuldade}/{refUser}/{id_user}/{info}', ['uses'=>'Painel\userController@getAutoMine']);
    Route::get('/datevalido/{dificuldade}/{id_user}/{token01}/{token02}/{refUser}', ['uses'=>'Painel\userController@ValidaAutoMine']);
    Route::get('/auto/{dificuldade}/{refUser}/{id_user}/{status}/{info}', ['uses'=>'Painel\userController@retornoCarregamentoautoFaucet']);
    Route::post('getReferencia', ['uses'=>'Painel\userController@getReferencia']);
    Route::get('cotacaoAuto', ['uses'=>'Painel\userController@getCotacao']);
    Route::post('verificarWallet', ['uses'=>'Painel\userController@getVerificarWallet']);
    Route::post('validarEntrar', ['uses'=>'Painel\userController@getvalidarEntrar']);
    Route::post('getValidarSession', ['uses'=>'Painel\userController@getValidarSession']);
});