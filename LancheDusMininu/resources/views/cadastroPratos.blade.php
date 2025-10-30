<!DOCTYPE html>
<html lang="pt">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro de Pratos</title>
</head>
<body>

<h2>Cadastro de Prato</h2>

<form action="/cadastro/pratos" method="POST">
    @csrf

    <label for="descricao">Descrição do Prato:</label>
    <input type="text" id="descricao" name="descricao" placeholder="Digite a descrição do prato" required>

    <label for="valor_unitario">Valor Unitário (somado dos ingredientes):</label>
    <input type="number" id="valor_unitario" step="0.01" name="valor_unitario" placeholder="Valor total calculado" required>

    <button type="submit">Cadastrar Prato</button>
</form>

</body>
</html>
