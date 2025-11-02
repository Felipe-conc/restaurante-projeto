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
})->name('index');


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
})->name('login');

//Rota cadastro usuário
Route::get('/cadastro/usuario', function () {
    return view('cadastro');
})->name('cadUsuario');

Route::post('/get-lanche', function (Request $request) {
    $id = $request->input('id', 0);

    if ($id <= 0) {
        return response()->json(['sucesso' => false, 'erro' => 'ID inválido']);
    }

    $lanche = DB::table('pratos')->where('cod_prato', $id)->first();

    if (!$lanche) {
        return response()->json(['sucesso' => false, 'erro' => 'Produto não encontrado']);
    }

    return response()->json([
    'sucesso' => true,
    'id' => $lanche->cod_prato,
    'titulo' => $lanche->titulo,
    'descricao' => $lanche->descricao,
    'imagem' => $lanche->imagem,
    'preco' => (float) $lanche->valor_unitario
    ]);

})->name('get-lanche');

Route::post('/fechar-pedido', function(Request $request) {
    $itens = $request->input('itens');
    $taxaEntrega = $request->input('taxaEntrega', 6.0);
    try {
        $subtotal = array_reduce($itens, function($carry, $item) {
                return $carry + $item['preco'];
            }, 0);
        
        $total = $subtotal + $taxaEntrega;

        $pedidos = new Pedidos(2, $total, now());
        $pedidos->gravar();

        foreach ($itens as $item) {
            DB::table('itens_pedido')->insert([
                'pedido_id' => $pedidoId,
                'nome' => $item['nome'],
                'qtd' => $item['qtd'],
                'preco_unitario' => $item['precoUnitario'],
                'preco' => $item['preco'],
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }

        // Aqui você faria inserções no banco:
        // 1. Criar registro de pedido
        // 2. Inserir itens do pedido relacionados
        // 3. Retornar sucesso ou erro
        return response()->json(['sucesso' => true, 'mensagem' => 'Pedido finalizado!']);

    } catch (\Exception $e) {
        DB::rollBack();
        return response()->json(['sucesso' => false, 'mensagem' => 'Erro ao finalizar pedido: '.$e->getMessage()]);
    }
})->name('fechar-pedido');
