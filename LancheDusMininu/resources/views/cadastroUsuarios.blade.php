<!DOCTYPE html>
<html lang="pt">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro de Usuário</title>
</head>
<body>

<h2>Cadastro de Usuário</h2>

<form action="/cadastro/usuarios" method="POST">
    @csrf

    <label for="nome_usuario">Nome de Usuário (login):</label>
    <input type="text" id="nome_usuario" name="nome_usuario" placeholder="Digite o nome de usuário" required>

    <label for="nome">Nome Completo:</label>
    <input type="text" id="nome" name="nome" placeholder="Digite seu nome" required>

    <label for="senha">Senha:</label>
    <input type="password" id="senha" name="senha" placeholder="Digite a senha" required>

    <button type="submit">Cadastrar Usuário</button>
</form>

</body>
</html>
