<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="/cadastro" method="POST">
    @csrf
        <label>Nome</label>
        <input type="text" id="nomeCliente">
        <label>Endereço</label>
        <input type="text" id="enderecoCliente">
        <label>Nº Casa</label>
        <input type="number" id="numeroEnderecoCliente">
        <label>Telefone</label>
        <input type="text" id="telefoneCliente">
        
        <button type="submit">Cadastrar</button>

    </form>
</body>
</html>