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
                    <a class="nav-link" href="{{ route('ranking') }}">Ranking</a>
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
        <h2>Ranking</h2>
    </div>

    <table class="table table-bordered table-hover align-middle shadow-sm">
        <thead class="table-primary">
            <tr>
                <th>#</th>
                <th>Nome</th>
                <th>Quantidade de Pedidos</th>
                <th width="180px" class="text-center">Ações</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($quant_ped_usuarios as $id =>$ped)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $ped['nome'] }}</td>
                    <td>{{ $ped['quantidade'] }}</td>
                    <td class="text-center">
                        <a href="/ver/pedidos/{{ $id }}" class="btn btn-sm btn-warning">Detalhes</a>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="4" class="text-center text-muted">Nenhum usuário com pedidos</td>
                </tr>
            @endforelse
        </tbody>
    </table>
</div>