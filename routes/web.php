<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It is a breeze. Simply tell Lumen the URIs it should respond to
| and give it the Closure to call when that URI is requested.
|
*/
$app->get('/', 'IndexController@index');

$app->get('servicos', 'ServicoController@index');
$app->get('servicos/novo', 'ServicoController@novo');
$app->post('servicos/salvar', 'ServicoController@salvar');
$app->get('servicos/editar/{id}', 'ServicoController@editar');
$app->post('servicos/editar', 'ServicoController@edit');
$app->get('servicos/delete/{id}', 'ServicoController@delete');

$app->get('clientes', 'ClienteController@index');
$app->get('clientes/novo', 'ClienteController@novo');
$app->post('clientes/salvar', 'ClienteController@salvar');
$app->get('clientes/editar/{id}', 'ClienteController@editar');
$app->post('clientes/editar', 'ClienteController@edit');
$app->get('clientes/delete/{id}', 'ClienteController@delete');

$app->get('tarefas', 'TarefasController@index');
$app->get('tarefas/listar', 'TarefasController@listar');
$app->post('tarefas/salvar', 'TarefasController@salvar');
$app->get('tarefas/editar/{id}', 'TarefasController@editar');
$app->post('tarefas/pagar', 'TarefasController@tarefaPagar');
$app->post('tarefas/desmarcar', 'TarefasController@tarefaDesmarcar');
$app->post('tarefas/atribuirFalta', 'TarefasController@atribuirFalta');

$app->get('relatorio/fiados', 'RelatorioController@fiados');
$app->get('relatorio/fiados/detalhe/{id}', 'RelatorioController@fiadosDetalhe');


