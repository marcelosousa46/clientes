<?php

/*
|--------------------------------------------------------------------------
| Rotas da Aplicação
|--------------------------------------------------------------------------
*/
/* Login */
Route::get('login', function() {
  return View::make('login2');
});
Route::post('login', 'AccountController@login');
Route::get('logout', array('uses' => 'AccountController@logout'));

/* middleware Rotas Cpntroladas pela Autenticação */
Route::group(['middleware' => 'terms'], function () {
    Route::get('/', function () {
            return view('welcome');
    });
    Route::get('get-clientes/{idCliente}', 'ClientesController@getClientes');    
    /* Setores */
    Route::controller('setores','SetoresController',[
        'anyData'     => 'setores.data',
        'getIndex'    => 'setores',
        'getCreate'   => 'setores.create',
        'postStore'   => 'setores.store',
        'getDestroy'  => 'setores.destroy',
        'postUpdate'  => 'setores.update',
    ]);
    /* Clientes */
    Route::controller('clientes', 'ClientesController', [
        'anyData'  => 'clientes.data',
        'getIndex' => 'clientes',
    ]);
    
    Route::controller('fontes', 'FontesController', [
        'getIndex'    => 'fontes',
        'postUpdate'  => 'fontes.update',
        'anyCsv'      => 'fontes.csv',
    ]);
    /* Produtos */
    Route::controller('produtos', 'produtosController', [
        'anyData'     => 'produtos.data',
        'getIndex'    => 'produtos',
        'getCreate'   => 'produtos.create',
        'postStore'   => 'produtos.store',
        'getDestroy'  => 'produtos.destroy',
        'postUpdate'  => 'produtos.update',
    ]);
    
    /* Escritórios associados */
    Route::controller('associados', 'Escritorio_assocController', [
        'anyData'     => 'associados.data',
        'anyDataf'    => 'associados.dataf',
        'getIndex'    => 'associados',
        'getCreate'   => 'associados.create',
        'postStore'   => 'associados.store',
        'getDestroy'  => 'associados.destroy',
        'postUpdate'  => 'associados.update',
        'getTeste'    => 'associados.teste',
    ]); 

});