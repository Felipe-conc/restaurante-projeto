<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Lanche Dus Mininu - Login</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">
    <!-- AOS CSS -->
    <link href="https://cdn.jsdelivr.net/npm/aos@2.3.4/dist/aos.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
     <link rel="stylesheet" href="{{ asset('login.css') }}">

</head>

<body>
    <a class="btn-voltar" href="{{ route('index') }}">
        <i class="fa fa-arrow-left"></i> Voltar
    </a>
    <!-- <button class="btn-voltar" onclick="window.location.href='index.php'">
        <i class="fa fa-arrow-left"></i> Voltar
    </button> -->

    <div class="container">

        <!-- Lado esquerdo -->
        <div class="left-panel">
        <h2>Bem vindo!</h2>
        <p>Ainda não possui uma conta? Crie agora mesmo!</p>
        <a href="{{ route('cadUsuario') }}" class="btn btn-outline">
    CADASTRAR-SE
</a>

        <!-- <button type="button" class="btn-outline" onclick="{{ route('cadUsuario') }}">CADASTRAR-SE</button> -->

        </div>

        <!-- Lado direito -->
        <div class="right-panel">
        <h2 style="margin-bottom: 40px;" >LOGIN</h2>
        @if(session('success'))
            <p style="color:green;">{{ session('success') }}</p>
        @endif

        @if(session('error'))
            <p style="color:red;">{{ session('error') }}</p>
        @endif
        <form action="/login" method="POST">
            @csrf
            <div class="input-group">
            <i class="fa fa-user"></i>
            <input type="text" name="usuario" placeholder="Usuário" required>
            </div>
            <div class="input-group">
            <i class="fa fa-lock"></i>
            <input type="password" name="senha" placeholder="Senha" required>
            </div>
            <button type="submit" class="btn-green">ENTRAR</button>
        </form>
        </div>
    </div>
    
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/aos@2.3.4/dist/aos.js"></script>
    <script>
        AOS.init({
            duration: 800, 
            once: true     
        });
    </script>
    <script>
        window.addEventListener("scroll", function () {
            const menu = document.getElementById("menu-fixo");
            if (window.scrollY > 200) { 
                menu.style.display = "block";
            } else {
                menu.style.display = "none";
            }
        });
    </script>

</body>

</html>