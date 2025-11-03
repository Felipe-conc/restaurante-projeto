<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Editar Ingrediente</title>
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
            <ul class="navbar-nav ms-auto">
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('listagemIngredientes') }}">Listagem</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link active" href="#">Editar Ingrediente</a>
                </li>
            </ul>
        </div>
    </div>
</nav>

<div class="container mt-5">
    <h2 class="mb-4">Editar Ingrediente</h2>

    <form action="/editar/ingrediente/{{ $ingrediente->cod_ingrediente }}" method="POST">
        @csrf

        <div class="mb-3">
            <label for="descricao" class="form-label">Nome do Ingrediente</label>
            <input type="text" id="descricao" name="descricao" class="form-control" 
                   value="{{ $ingrediente->descricao }}" required>
        </div>

        <div class="mb-3">
            <label for="valor_unitario" class="form-label">Preço</label>
            <input type="number" class="form-control" id="valor_unitario" name="valor_unitario" step="0.01" value="{{ $ingrediente->valor_unitario }}" required>
        </div>

        <div class="d-flex justify-content-between">
            <a href="{{ route('listagemIngredientes') }}" class="btn btn-secondary">Voltar</a>
            <button type="submit" class="btn btn-primary">Salvar Alterações</button>
        </div>
    </form>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
