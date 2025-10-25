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

    $nome = $request->input('nomeCliente'); 
    $endereco = $request->input('enderecoCliente');
    $numeroCasa = $request->input('numeroEnderecoCliente');
    $telefone = $request->input('telefoneCliente');

    $cliente = new Clientes($nome, $endereco, $numeroCasa, $telefone);

    //$clientes = new Clientes($request->nomeCliente, $request->enderecoCliente, $request->numeroEnderecoCliente, $request->telefoneCliente);
    // $cliente->gravar($request->nomeCliente, $request->enderecoCliente, $request->numeroEnderecoCliente, $request->telefoneCliente);
    $cliente->gravar($nome, $endereco, $numeroCasa, $telefone);

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



