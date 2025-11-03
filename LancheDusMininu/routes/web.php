<?php
use App\Models\Usuarios;
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
})->name('cadIngrediente');

//Rota cadastro de ingredientes
Route::post('/cadastro/ingredientes', function (Request $request) {

    $descricao = $request->input('descricao');
    $valor_unitario = $request->input('valor_unitario');

    $ingrediente = new Ingredientes($descricao, $valor_unitario);
    $ingrediente->gravar();

    return redirect()->route('listagemIngredientes');
});

//Lista de Usuários
Route::get('/listagem/ingredientes', function () {
    $ingredientes = Ingredientes::all();

    return view('listagemIngredientes', ["listaIngredientes"=>$ingredientes]);
})->name('listagemIngredientes');

Route::get('/editar/ingrediente/{cod_usuario}', function ($cod_usuario) {
    $ingrediente = Ingredientes::find($cod_usuario);

    if (!$ingrediente) {
        return redirect('/listagem/ingredientes')->with('error', 'Ingrediente não encontrado.');
    }

    return view('editarIngrediente', ['ingrediente' => $ingrediente]);
});

Route::post('/editar/ingrediente/{cod_ingrediente}', function (Request $request, $cod_ingrediente) {
    $ingrediente = Ingredientes::find($cod_ingrediente);

    if (!$ingrediente) {
        return redirect('/listagem/ingredientes')->with('error', 'Ingrediente não encontrado.');
    }

     $data = [
        'descricao'      => $request->input('descricao'),
        'valor_unitario' => $request->input('valor_unitario')
    ];

    Ingredientes::update($cod_ingrediente, $data);

    return redirect('/listagem/ingredientes')->with('success', 'Ingrediente atualizado com sucesso!');
});

Route::delete('/excluir/ingrediente/{cod_ingrediente}', function ($cod_ingrediente) {
    App\Models\Ingredientes::delete($cod_ingrediente);
    return redirect('/listagem/ingredientes')->with('success', 'Usuário excluído com sucesso!');
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

Route::post('/login', function (Request $request) {

    $usuario = $request->input('usuario');
    $senha = $request->input('senha');
    
    if ($usuario === 'admin' && $senha === '1234') {
        return view('admin');
    }

    $usuarioVerifica = DB::table('usuarios')
    ->where('nome_usuario', $usuario)
    ->where('senha', $senha)
    ->first();

    if($usuarioVerifica){
        //usuário logado
    } else {
        return redirect('/login')->with('error', 'Usuário não encontrado.');
    }

});

//Rota admin
Route::get('/admin', function () {
    return view('admin');
})->name('admin');

//Rota cadastro usuário
Route::get('/cadastro/usuario', function () {
    return view('cadastro');
})->name('cadUsuario');

Route::post('/cadastro/usuario', function (Request $request) {
    $data = [
        'nome' => $request->input('nome'),
        'nome_usuario' => $request->input('usuario'),
        'email' => $request->input('email'),
        'senha' => $request->input('senha')
    ];

    $usuario = new Usuarios();
    $usuario->create($data);

    return redirect()->route('index');
});

//Rota cadastro usuário na tela do admin
Route::get('/cadastro/usuarioAdmin', function () {
    return view('cadastroUsuarios');
})->name('cadUsuarioAdmin');

Route::post('/cadastro/usuarioAdmin', function (Request $request) {
    $data = [
        'nome' => $request->input('nome'),
        'nome_usuario' => $request->input('nome_usuario'),
        'email' => $request->input('email'),
        'senha' => $request->input('senha')
    ];

    $usuario = new Usuarios();
    $usuario->create($data);

    return redirect()->route('listagemUsuarios');
});

//Lista de Usuários
Route::get('/listagem/usuarios', function () {
    $usuarios = Usuarios::all();

    return view('listagemUsuarios', ["listaUsuarios"=>$usuarios]);
})->name('listagemUsuarios');

//Editar de usuário
Route::get('/editar/usuario/{cod_usuario}', function ($cod_usuario) {
    $usuario = Usuarios::find($cod_usuario);

    if (!$usuario) {
        return redirect('/listagem/usuarios')->with('error', 'Usuário não encontrado.');
    }

    return view('editarUsuario', ['usuario' => $usuario]);
});

Route::post('/editar/usuario/{cod_usuario}', function (Request $request, $cod_usuario) {
    $usuario = Usuarios::find($cod_usuario);

    if (!$usuario) {
        return redirect('/listagem/usuarios')->with('error', 'Usuário não encontrado.');
    }

     $data = [
        'nome'         => $request->input('nome'),
        'nome_usuario' => $request->input('nome_usuario'),
        'email'        => $request->input('email'),
    ];

    if (!empty($request->input('senha'))) {
        $data['senha'] = bcrypt($request->input('senha'));
    }

     Usuarios::updateUser($cod_usuario, $data);

    return redirect('/listagem/usuarios')->with('success', 'Usuário atualizado com sucesso!');
});

Route::delete('/excluir/usuario/{cod_usuario}', function ($cod_usuario) {
    App\Models\Usuarios::deleteUser($cod_usuario);
    return redirect('/listagem/usuarios')->with('success', 'Usuário excluído com sucesso!');
});

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
        $pedidoId = $pedidos->gravar();

        foreach ($itens as $item) { 
            $prato = DB::table('pratos')->where('titulo', $item['nome'])->first();

            if (!$prato) {
                throw new Exception("Prato '{$item['nome']}' não encontrado.");
            }

            DB::table('itens_pedidos')->insert([ 
                'cod_pedido' => $pedidoId, 
                'cod_prato' => $prato->cod_prato, 
                'quantidade' => $item['qtd'], 
                'valor_unitario' => $item['precoUnitario'] 
            ]); 
        }

        return response()->json(['sucesso' => true, 'mensagem' => 'Pedido finalizado!']);

    } catch (\Exception $e) {
        DB::rollBack();
        return response()->json(['sucesso' => false, 'mensagem' => 'Erro ao finalizar pedido: '.$e->getMessage()]);
    }
})->name('fechar-pedido');
