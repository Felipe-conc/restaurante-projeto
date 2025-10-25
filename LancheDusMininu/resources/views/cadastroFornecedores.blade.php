<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Fornecedores</title>
</head>
<body>

<h2>Cadastro de Fornecedores</h2>

<form action="/cadastro/fornecedores" method="POST">
    @csrf
    <label for="razao_social">Razão Social:</label>
    <input type="text" id="razao_social" name="razao_social" placeholder="Digite a razão social" required>

    <label for="cnpj">CNPJ:</label>
    <input type="text" id="cnpj" name="cnpj" placeholder="000.000.000-00" required>

    <button type="submit">Cadastrar Fornecedor</button>
</form>

</body>
</html>