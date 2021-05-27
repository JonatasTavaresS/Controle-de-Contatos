<?php

use Illuminate\Support\Facades\Auth;
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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

require __DIR__ . '/auth.php';

// Contatos
Route::get('/contatos', 'App\Http\Controllers\ContatosController@index')
    ->name('listar_contatos')
    ->middleware('autenticador');
Route::get('/contatos/adicionar', 'App\Http\Controllers\ContatosController@create')
    ->name('form_criar_contato')
    ->middleware('autenticador');
Route::post('/contatos/adicionar', 'App\Http\Controllers\ContatosController@store');

// Dados
Route::get('/contatos/{contatoId}/dados', 'App\Http\Controllers\DadosController@index')
    ->name('listar_dados');
Route::get('/contatos/{contatoId}/editar', 'App\Http\Controllers\DadosController@edit');
Route::post('/contatos/{contatoId}/editar', 'App\Http\Controllers\DadosController@editar');
Route::delete('/contatos/{contatoId}/remover', 'App\Http\Controllers\ContatosController@removerContato');

// Endereço
Route::get('/enderecos/{enderecoId}/dados', 'App\Http\Controllers\EnderecosController@index');
Route::get('/enderecos/{contatoId}/adicionar', 'App\Http\Controllers\EnderecosController@adiciona');
Route::post('/enderecos/{contatoId}/adicionar', 'App\Http\Controllers\EnderecosController@adicionar');
Route::delete('/enderecos/{enderecoId}/remover', 'App\Http\Controllers\EnderecosController@remover');

// Login e Cadastro
Route::get('/entrar', 'App\Http\Controllers\EntrarController@index');
Route::post('/entrar', 'App\Http\Controllers\EntrarController@entrar');
Route::get('/registrar', 'App\Http\Controllers\RegistroController@create');
Route::post('/registrar', 'App\Http\Controllers\RegistroController@store');
Route::get('/sair', function () {
    Auth::logout();
    return redirect('/entrar');
});