<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <title>Admin Lanchonete</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css" rel="stylesheet">
    <style>
        body {
            font-family: 'Poppins', sans-serif;
            background: linear-gradient(180deg, #f5f8ff 0%, #eef2f7 100%);
        }
        .hero {
            text-align: center;
            padding: 80px 20px 50px 20px;
        }
        .hero h1 {
            font-weight: 700;
            font-size: 2.5rem;
            background: linear-gradient(45deg, #0d6efd, #6610f2);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
        }
        .hero p {
            color: #555;
            font-size: 1.1rem;
        }
        .dashboard-cards {
            margin-top: 30px;
        }
        .dashboard-card {
            transition: transform 0.3s, box-shadow 0.3s;
            border: none;
            border-radius: 15px;
        }
        .dashboard-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 5px 20px rgba(0,0,0,0.1);
        }
        .dashboard-card i {
            font-size: 45px;
            margin-bottom: 15px;
            color: #0d6efd;
        }
        .ranking-btn {
            margin-top: 50px;
            font-weight: 600;
            font-size: 1.2rem;
            padding: 15px 40px;
            border-radius: 30px;
        }
    </style>
</head>
<body>

<!-- Navbar -->
<nav class="navbar navbar-expand-lg navbar-dark bg-primary">
    <div class="container-fluid">
        <a class="navbar-brand" href="#">Gestão da Lanchonete</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
            aria-controls="navbarNav" aria-expanded="false" aria-label="Alternar navegação">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ms-auto">
                <li class="nav-item"><a class="nav-link" href="{{ route('cadUsuarioAdmin') }}">Cadastrar Usuário</a></li>
                <li class="nav-item"><a class="nav-link" href="{{ route('listagemUsuarios') }}">Listar Usuários</a></li>
                <li class="nav-item"><a class="nav-link" href="{{ route('cadIngrediente') }}">Cadastrar Ingrediente</a></li>
                <li class="nav-item"><a class="nav-link" href="{{ route('listagemIngredientes') }}">Listar Ingredientes</a></li>
                <li class="nav-item"><a class="nav-link" href="{{ route('cadPratos') }}">Cadastrar Prato</a></li>
                <li class="nav-item"><a class="nav-link" href="{{ route('listagemPratos') }}">Listar Pratos</a></li>
                <li class="nav-item"><a class="nav-link" href="{{ route('listagemGeral') }}">Listagem Geral</a></li>
                <li class="nav-item"><a class="nav-link" href="{{ route('ranking') }}">Ranking</a></li>
                <li class="nav-item"><a class="nav-link" href="{{ route('index') }}">Sair</a></li>
            </ul>
        </div>
    </div>
</nav>

<!-- Conteúdo principal -->
<div class="container hero">
    <h1>Bem-vindo ao Painel da Lanchonete</h1>
    <p>Gerencie usuários, ingredientes e pratos com facilidade — tudo em um só lugar.</p>

    <div class="row text-center dashboard-cards">
        <div class="col-md-4 mb-4">
            <div class="card dashboard-card shadow-sm p-4">
                <i class="bi bi-people-fill"></i>
                <h5>Usuários</h5>
                <p>Cadastre, visualize e edite os usuários do sistema.</p>
                <a href="{{ route('listagemUsuarios') }}" class="btn btn-outline-primary">Ver Usuários</a>
            </div>
        </div>
        <div class="col-md-4 mb-4">
            <div class="card dashboard-card shadow-sm p-4">
                <i class="bi bi-basket3-fill"></i>
                <h5>Ingredientes</h5>
                <p>Gerencie os ingredientes utilizados nos pratos.</p>
                <a href="{{ route('listagemIngredientes') }}" class="btn btn-outline-primary">Ver Ingredientes</a>
            </div>
        </div>
        <div class="col-md-4 mb-4">
            <div class="card dashboard-card shadow-sm p-4">
                <i class="bi bi-cup-hot-fill"></i>
                <h5>Pratos</h5>
                <p>Cadastre novos pratos e visualize o cardápio completo.</p>
                <a href="{{ route('listagemPratos') }}" class="btn btn-outline-primary">Ver Pratos</a>
            </div>
        </div>
    </div>

    <a href="{{ route('ranking') }}" class="btn btn-primary ranking-btn">
        <i class="bi bi-bar-chart-line-fill me-2"></i> Ver Ranking de Vendas
    </a>
</div>

<!-- Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>
