<?php

use Illuminate\Support\Facades\Route;

/* SITE */
route::get('/', ['as' => 'site.home', 'uses' => 'Site\HomeController@index']);
Route::get('/email', [App\Http\Controllers\EmailController::class, 'create']);
Route::post('/email', [App\Http\Controllers\EmailController::class, 'sendEmail'])->name('send.email');
Route::get('/cadastrar-usuario', ['as' => 'site.cadastrar', 'uses' => 'Site\RegisterUserController@index']);
Route::get('/sobre', ['as' => 'site.sobre', 'uses' => 'Site\sobreController@index']);
Route::get('/login-user', ['as' => 'site.login', 'uses' => 'Site\InciarSessaoController@index']);
Route::get('/vagas', ['as' => 'site.vagas', 'uses' => 'Site\VagaController@index']);
Route::get('/pesquisar', ['as' => 'site.search', 'uses' => 'Site\SearchController@create']);
Route::get('/pesquisar/find', ['as' => 'site.search.find', 'uses' => 'Site\SearchController@find']);


Route::get('registrar-conta/create', ['as' => 'admin.registrar.create', 'uses' => 'Admin\ClienteController@create']);
Route::post('registrar-contas/store', ['as' => 'admin.registrar.store', 'uses' => 'Admin\ClienteController@store']);

/* END SITE */



/* inclui as rotas de autenticação do ficheiro auth.php */
require __DIR__ . '/auth.php';

require __DIR__ . '/admin.php';
