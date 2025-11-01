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
    <label>Nome de Usuário:</label>
    <input type="text" name="nome_usuario" required>

    <label>Nome:</label>
    <input type="text" name="nome" required>

    <label>Senha:</label>
    <input type="password" name="senha" required>

    <button type="submit">Cadastrar</button>
</form>


</body>
</html>
