<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pedidos</title>
</head>
<body>

<h2>Cadastro de Pedido</h2>

<form action="/cadastro/pedidos" method="POST">
    @csrf
    <label for="cod_cliente">Código do Cliente:</label>
    <input type="number" id="cod_cliente" name="cod_cliente" placeholder="Digite o código do cliente" required>

    <label for="preco_total">Preço Total:</label>
    <input type="number" id="preco_total" step="0.01" name="preco_total" required>

    <label for="data_pedido">Data do Pedido:</label>
    <input type="date" id="data_pedido" name="data_pedido" required>

    <button type="submit">Cadastrar Pedido</button>
</form>

</body>
</html>