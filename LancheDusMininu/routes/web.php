<?php
use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use App\Models\Clientes;

Route::get('/', function () {
    return view('index');
});

Route::get('/cadastro/clientes', function () {
    return view('cadastroClientes');
});

Route::post('/cadastro/clientes', function (Request $request) {

    $nome = $request->input('nomeCliente');
    $endereco = $request->input('enderecoCliente');
    $numeroCasa = $request->input('numeroEnderecoCliente');
    $telefone = $request->input('telefoneCliente');

    $cliente = new Clientes($nome, $endereco, $numeroCasa, $telefone);
    $cliente->gravar();

    return "Usuário cadastrado!";
});

Route::get('/login', function () {
    return view('login');
});

Route::get('/cadastro/fornecedores', function () {
    return view('cadastroFornecedores');
});

Route::post('/cadastro/fornecedores', function (Request $request) {

    $razaoSocial = $request->input('razao_social');
    $cnpj = $request->input('cnpj');

    $fornecedor = new Fornecedores($razaoSocial, $cnpj);
    $fornecedor->gravar($razaoSocial,$cnpj);

    return "Fornecedor cadastrado!";
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



