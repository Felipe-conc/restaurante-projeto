<!DOCTYPE html>
<html>
<head>
    <title>Cadastro de Cliente</title>
</head>
<body>
    <h2>Cadastro de Cliente</h2>

    @if(session('success'))
        <p style="color:green;">{{ session('success') }}</p>
    @endif

    @if(session('error'))
        <p style="color:red;">{{ session('error') }}</p>
    @endif

    <form action="/cadastro/cliente" method="POST">
        @csrf
        <input type="text" name="nomeCliente" placeholder="Nome" required><br><br>
        <input type="text" name="enderecoCliente" placeholder="Endereço" required><br><br>
        <input type="text" name="numeroEnderecoCliente" placeholder="Número" required><br><br>
        <input type="text" name="telefoneCliente" placeholder="Telefone" required><br><br>
        <button type="submit">Cadastrar</button>
    </form>
</body>
</html>