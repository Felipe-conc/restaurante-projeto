<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Listagem de Pratos</title>
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
                    <a class="nav-link" href="{{ route('cadPratos') }}">Cadastrar Prato</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link active" href="{{ route('listagemPratos') }}">Listagem de Pratos</a>
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
        <h2>Pratos Cadastrados</h2>
        <a href="{{ route('cadPratos') }}" class="btn btn-primary">Novo Prato</a>
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
            @forelse ($listaPratos as $prato)
                <tr>
                    <td>{{ $prato->cod_prato }}</td>
                    <td>{{ $prato->descricao }}</td>
                    <td>R$ {{ number_format($prato->valor_unitario, 2, ',', '.') }}</td>
                    <td class="text-center">
                        <a href="/editar/prato/{{ $prato->cod_prato }}" class="btn btn-sm btn-warning">Editar</a>

                        <form action="/excluir/prato/{{ $prato->cod_prato }}" method="POST" class="d-inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-sm btn-danger"
                                    onclick="return confirm('Deseja realmente excluir este prato?')">
                                Excluir
                            </button>
                        </form>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="4" class="text-center text-muted py-3">
                        Nenhum prato cadastrado.
                    </td>
                </tr>
            @endforelse
        </tbody>
    </table>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
