<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Listagem de Ingredientes</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

<!-- Navbar -->
<nav class="navbar navbar-expand-lg navbar-dark bg-primary">
    <div class="container-fluid">
        <a class="navbar-brand" href="#">Gestão da Lanchonete</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" 
                data-bs-target="#navbarNav" aria-controls="navbarNav" 
                aria-expanded="false" aria-label="Alternar navegação">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ms-auto">
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('cadIngrediente') }}">Cadastrar Ingrediente</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link active" href="{{ route('listagemIngredientes') }}">Listagem de Ingredientes</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('admin') }}">Início</a>
                </li>
            </ul>
        </div>
    </div>
</nav>

<!-- Conteúdo -->
<div class="container mt-5">
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h2>Ingredientes Cadastrados</h2>
        <a href="{{ route('cadIngrediente') }}" class="btn btn-primary">Novo Ingrediente</a>
    </div>

    <table class="table table-bordered table-hover align-middle shadow-sm">
        <thead class="table-primary">
            <tr>
                <th>ID</th>
                <th>Descrição</th>
                <th>Valor Unitário (R$)</th>
                <th width="180px" class="text-center">Ações</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($listaIngredientes as $ingrediente)
                <tr>
                    <td>{{ $ingrediente->cod_ingrediente }}</td>
                    <td>{{ $ingrediente->descricao }}</td>
                    <td>R$ {{ number_format($ingrediente->valor_unitario, 2, ',', '.') }}</td>
                    <td class="text-center">
                        <a href="/editar/ingrediente/{{ $ingrediente->cod_ingrediente }}" class="btn btn-sm btn-warning">Editar</a>
                        <form action="/excluir/ingrediente/{{ $ingrediente->cod_ingrediente }}" method="POST" class="d-inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-sm btn-danger"
                                    onclick="return confirm('Deseja realmente excluir este ingrediente?')">
                                Excluir
                            </button>
                        </form>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="4" class="text-center text-muted py-3">
                        Nenhum ingrediente cadastrado.
                    </td>
                </tr>
            @endforelse
        </tbody>
    </table>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
