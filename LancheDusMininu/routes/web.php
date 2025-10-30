<?php
use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use App\Models\Clientes;
use App\Models\Fornecedores;
use App\Models\Ingredientes;
use App\Models\Pedidos;
use App\Models\Pratos;


//Index
Route::get('/', function () {
    return view('index');
});

//Rota clientes
Route::get('/cadastro/clientes', function () {
    return view('cadastroClientes');
});

//Rota cadastro de clientes
Route::post('/cadastro/clientes', function (Request $request) {

    $nome = $request->input('nomeCliente');
    $endereco = $request->input('enderecoCliente');
    $numeroCasa = $request->input('numeroEnderecoCliente');
    $telefone = $request->input('telefoneCliente');

    $cliente = new Clientes($nome, $endereco, $numeroCasa, $telefone);
    $cliente->gravar();

    return "Usuário cadastrado!";
});

//Rota fornecedores
Route::get('/cadastro/fornecedores', function () {
    return view('cadastroFornecedores');
});

//Rota cadastro de fornecedores
Route::post('/cadastro/fornecedores', function (Request $request) {

    $razaoSocial = $request->input('razao_social');
    $cnpj = $request->input('cnpj');

    $fornecedores = new Fornecedores($razaoSocial, $cnpj);
    $fornecedores->gravar();

    return "Fornecedor cadastrado!";
});

//Rota ingredientes
Route::get('/cadastro/ingredientes', function () {
    return view('cadastroIngredientes');
});

//Rota cadastro de ingredientes
Route::post('/cadastro/ingredientes', function (Request $request) {

    $descricao = $request->input('descricao');
    $valor_unitario = $request->input('valor_unitario');

    $ingrediente = new Ingredientes($descricao, $valor_unitario);
    $ingrediente->gravar();

    return "Ingrediente cadastrado!";
});

//Rota pedidos
Route::get('/cadastro/pedidos', function () {
    return view('cadastroPedidos');
});

//Rota cadastro de pedidos
Route::post('/cadastro/pedidos', function (Request $request) {

    $cod_cliente = $request->input('cod_cliente');
    $preco_total = $request->input('preco_total');
    $data_pedido = $request->input('data_pedido');

    $pedido = new Pedidos($cod_cliente, $preco_total, $data_pedido);
    $pedido->gravar();

    return "Pedido cadastrado!";
});


//Rota pedidos
Route::get('/cadastro/pratos', function () {
    return view('cadastroPratos');
});

//Rota cadastro de pedidos
Route::post('/cadastro/pratos', function (Request $request) {

    $descricao = $request->input('descricao');
    $valor_unitario = $request->input('valor_unitario');

    $prato = new Pratos($descricao, $valor_unitario);
    $prato->gravar();

    return "Pedido cadastrado!";
});

//Rota login
Route::get('/login', function () {
    return view('login');
});

