<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Ranking</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
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


<div class="container my-4">
    <h3 class="mb-4 text-center">Pedidos do Usuário</h3>

    <table class="table table-bordered table-hover align-middle shadow-sm">
    <thead class="table-primary">
        <tr>
            <th>#</th>
            <th>Usuário</th>
            <th>Data do Pedido</th>
            <th>Valor Total</th>
            <th>Ações</th>
        </tr>
    </thead>
    <tbody>
        @forelse ($detalhesPedidos as $index => $pedido)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $pedido['usuario'] }}</td>
                <td>{{ date('d/m/Y', strtotime($pedido['pedido']->data_pedido)) }}</td>
                <td>R$ {{ number_format($pedido['valor_total'], 2, ',', '.') }}</td>
                <td>
                    <button class="btn btn-sm btn-info" type="button" data-bs-toggle="collapse" data-bs-target="#itens{{ $index }}">
                        Ver Itens
                    </button>
                </td>
            </tr>
            <tr class="collapse" id="itens{{ $index }}">
                <td colspan="5">
                    <table class="table table-sm table-striped mb-0">
                        <thead class="table-light">
                            <tr>
                                <th>Prato</th>
                                <th>Quantidade</th>
                                <th>Valor Unitário</th>
                                <th>Valor Total</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($pedido['itens'] as $item)
                                <tr>
                                    <td>{{ $item['titulo'] }}</td>
                                    <td>{{ $item['quantidade'] }}</td>
                                    <td>R$ {{ number_format($item['valor_unitario'], 2, ',', '.') }}</td>
                                    <td>R$ {{ number_format($item['valor_total'], 2, ',', '.') }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </td>
            </tr>
        @empty
            <tr>
                <td colspan="5" class="text-center text-muted">Nenhum pedido encontrado</td>
            </tr>
        @endforelse
    </tbody>
</table>
</div>