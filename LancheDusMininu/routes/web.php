<?php
use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use App\Models\Clientes;

Route::get('/', function () {
    return view('index');
});

Route::get('/cadastro', function () {
    return view('cadastro');
});

Route::post('/cadastro', function (Request $request) {
    $novoCliente = new Clientes();
    

    return "Usuário cadastrado!";
});

Route::get('/login', function () {
    return view('login');
});

Route::get('/cadastro_clientes', function () {
    return view('clientes');
});

Route::get('/cadastro_fornecedores', function () {
    return view('fornecedores');
});

Route::get('/cadastro_ingredientes', function () {
    return view('ingredientes');
});

Route::get('/cadastro_pedidos', function () {
    return view('pedidos');
});

Route::get('/cadastro_fornecedores', function () {
    return view('fornecedores');
});



