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

// Rota da API do whatsapp
Route::get('whatsapp', 'whatsapp@show');

// API do Telegram
Route::post('telegram', 'telegram_api\telegram@createApi');

// Roda para ser usada na página de testes
Route::post('telegram-teste', 'telegram_api\telegram@sendTeste');

Route::get('telegram-teste', function () {
    return view('ApiTeste.telegram_teste');
});

// Teste da API
Route::get('teste/whatsapp', function () {
    return view('ApiTeste.whatsapp_teste');
});