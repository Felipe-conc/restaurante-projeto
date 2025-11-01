<?php
use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use App\Models\Clientes;
use App\Models\Fornecedores;
use App\Models\Ingredientes;
use App\Models\Pedidos;
use App\Models\Pratos;
use App\Http\Controllers\UsuariosController;


//Index
Route::get('/', function () {
    $pratos = new Pratos(null, null);
    $pratos = $pratos->listar();
    return view('index', ["listaPratos"=>$pratos]);
});


// CLIENTES

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

Route::post('/deletar/clientes', function (Request $request){
    $id = $request->input('cod_cliente');

    $cliente = new Clientes(null,null,null,null);
    $cliente->setCodCliente($id);
    $cliente->excluir();

    return "Cliente deletado!";
});


// FORNECEDORES

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

Route::post('/deletar/fornecedores', function (Request $request){
    $id = $request->input('cod_fornecedor');

    $fornecedor = new Fornecedores(null,null);
    $fornecedor->setCodFornecedor($id);
    $fornecedor->excluir();

    return "Fornecedor deletado!";
});

//  INGREDIENTES

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

Route::post('/deletar/ingredientes', function (Request $request){
    $id = $request->input('cod_ingrediente');

    $ingrediente = new Ingredientes(null,null);
    $ingrediente->setCodIngrediente($id);
    $ingrediente->excluir();

    return "Ingrediente deletado!";

});

// PEDIDOS

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

Route::post('/deletar/pedidos', function (Request $request){
    $id = $request->input('cod_pedido');

    $pedido = new Pedidos(null,null, null);
    $pedido->setCodPedido($id);
    $pedido->excluir();

    return "Pedido deletado!";

});

// PRATOS

//Rota pratos
Route::get('/cadastro/pratos', function () {
    return view('cadastroPratos');
});

//Rota cadastro de pratos
Route::post('/cadastro/pratos', function (Request $request) {

    $descricao = $request->input('descricao');
    $valor_unitario = $request->input('valor_unitario');

    $prato = new Pratos($descricao, $valor_unitario);
    $prato->gravar();

    return "Prato cadastrado!";
});

Route::post('/deletar/pratos', function (Request $request){
    $id = $request->input('cod_prato');

    $prato = new Pratos(null,null);
    $prato->setCodPrato($id);
    $prato->excluir();

    return "Prato deletado!";

});

//Rota login
Route::get('/login', function () {
    return view('login');
});

