<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Listagem de Usuários</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

<nav class="navbar navbar-expand-lg navbar-dark bg-primary">
    <div class="container-fluid">
        <a class="navbar-brand" href="#">Gestão da Lanchonete</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" 
                data-bs-target="#navbarNav" aria-controls="navbarNav" 
                aria-expanded="false" aria-label="Alternar navegação">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ms-auto"> <!-- alinhado à direita -->
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('cadUsuarioAdmin') }}">Cadastrar Usuário</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link active" href="{{ route('listagemUsuarios') }}">Listagem de Usuários</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('admin') }}">Início</a>
                </li>
            </ul>
        </div>
    </div>
</nav>

<div class="container mt-5">
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h2>Usuários Cadastrados</h2>
        <a href="{{ route('cadUsuarioAdmin') }}" class="btn btn-primary">Novo Usuário</a>
    </div>

    <table class="table table-bordered table-hover align-middle shadow-sm">
        <thead class="table-primary">
            <tr>
                <th>ID</th>
                <th>Nome</th>
                <th>Nome de Usuário</th>
                <th>Email</th>
                <th width="180px">Ações</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($listaUsuarios as $usuario)
                <tr>
                    <td>{{ $usuario->cod_usuario }}</td>
                    <td>{{ $usuario->nome }}</td>
                    <td>{{ $usuario->nome_usuario }}</td>
                    <td>{{ $usuario->email }}</td>
                    <td class="text-center">
                        <a href="/editar/usuario/{{ $usuario->cod_usuario }}" class="btn btn-sm btn-warning">Editar</a>
                        <form action="/excluir/usuario/{{ $usuario->cod_usuario }}" method="POST" class="d-inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-sm btn-danger" 
                                    onclick="return confirm('Deseja realmente excluir este usuário?')">
                                Excluir
                            </button>
                        </form>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="6" class="text-center text-muted py-3">
                        Nenhum usuário cadastrado.
                    </td>
                </tr>
            @endforelse
        </tbody>
    </table>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
