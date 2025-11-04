<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Detalhes</title>
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
        <h2>Detalhes</h2>
    </div>
    <table class="table table-bordered table-hover align-middle shadow-sm">
        <thead class="table-primary">
            <tr>
                <th>#</th>
                <th>Código do Pedido</th>
                <th>Prato</th>
                <th>Quantidade</th>
                <th>Valor Unitário</th>
                <th>Subtotal</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($detalhesPedidos as $index => $pedido)
                @foreach ($pedido['itens'] as $item)
                    <tr>
                        <td>{{ $loop->parent->iteration }}</td>
                        <td>{{ $pedido['pedido']->cod_pedido }}</td>
                        <td>{{ $item['titulo'] }}</td>
                        <td>{{ $item['quantidade'] }}</td>
                        <td>R$ {{ number_format($item['valor_unitario'], 2, ',', '.') }}</td>
                        <td>R$ {{ number_format($item['valor_item'], 2, ',', '.') }}</td>
                    </tr>
                @endforeach
                <tr class="table-secondary fw-bold">
                    <td colspan="5" class="text-end">Total do Pedido #{{ $pedido['pedido']->cod_pedido }}</td>
                    <td>R$ {{ number_format($pedido['valor_total'], 2, ',', '.') }}</td>
                </tr>
            @empty
                <tr>
                    <td colspan="6" class="text-center text-muted">
                        Nenhum pedido encontrado para este usuário
                    </td>
                </tr>
            @endforelse
        </tbody>
    </table>
</div>
</body>
