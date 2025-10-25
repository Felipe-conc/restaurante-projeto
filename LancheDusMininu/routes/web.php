<?php
use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use App\Models\Clientes;
use App\Models\Ingredientes;

Route::get('/', function () {
    return view('index');
});

Route::get('/cadastro/cliente', function () {
    return view('cadastroCliente');
});

Route::post('/cadastro/cliente', function (Request $request) {

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
    return view('CadastroFornecedores');
});

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



