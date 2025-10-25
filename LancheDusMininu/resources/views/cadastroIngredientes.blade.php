<!DOCTYPE html>
<html>
<head>
    <title>Cadastro de Ingrediente</title>
</head>
<body>
    <h2>Cadastro de Ingredientes</h2>

<form action="/cadastro/ingredientes" method="POST">
    @csrf
    <label for="descricao">Descrição:</label>
    <input type="text" id="descricao" name="descricao" placeholder="Digite a Descrição" required>

    <label for="valor_unitario">Preço:</label>
    <input type="number" id="valor_unitario" name="valor_unitario" step="0.01" placeholder="Digite o valor unitario">

    <button type="submit">Cadastrar Ingrediente</button>
</form>
</body>
</html>