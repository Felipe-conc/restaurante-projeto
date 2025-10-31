<?php

class Usuario
{
    private $nome_usuario;
    private $nome;
    private $senha;

    public function __construct($nome_usuario, $nome, $senha)
    {
        $this->nome_usuario = $nome_usuario;
        $this->nome = $nome;
        $this->senha = $senha;
    }

    // GETTERS
    public function getNomeUsuario()
    {
        return $this->nome_usuario;
    }

    public function getNome()
    {
        return $this->nome;
    }

    public function getSenha()
    {
        return $this->senha;
    }

    // SETTERS
    public function setNomeUsuario($nome_usuario)
    {
        $this->nome_usuario = $nome_usuario;
    }

    public function setNome($nome)
    {
        $this->nome = $nome;
    }

    public function setSenha($senha)
    {
        $this->senha = $senha;
    }
}
?>
