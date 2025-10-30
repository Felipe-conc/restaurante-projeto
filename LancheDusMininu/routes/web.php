<?php
use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use App\Models\Clientes;
use App\Models\Fornecedores;
use App\Models\Ingredientes;

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

/* FORNECEDORES */

Route::get('/cadastro/fornecedores', function () {
    return view('cadastroFornecedores');
});

Route::post('/cadastro/fornecedores', function (Request $request) {

    $razaoSocial = $request->input('razao_social');
    $cnpj = $request->input('cnpj');

    $fornecedores = new Fornecedores($razaoSocial, $cnpj);
    $fornecedores->gravar();

    return "Fornecedor cadastrado!";
});

/* INGREDIENTES */ 

Route::get('/cadastro/ingrediente', function () {
    return view('cadastroIngrediente');
});

Route::post('/cadastro/ingrediente', function (Request $request) {

    $descricao = $request->input('descricao');
    $valor_unitario = $request->input('valor_unitario');

    $ingrediente = new Ingredientes($descricao, $valor_unitario);
    $ingrediente->gravar();

    return "Ingrediente cadastrado!";
});



Route::get('/cadastro_pedidos', function () {
    return view('pedidos');
});

Route::get('/cadastro_fornecedores', function () {
    return view('fornecedores');
});



