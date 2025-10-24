<?php

class Cliente {

    private $cod_cliente;
    private $nome;
    private $endereco;
    private $telefone;


    public function __construct($nome, $endereco, $telefone){
        $this->nome = $nome;
        $this->endereco = $endereco;
        $this->telefone = $telefone;
    }


   public function getCodCliente() {
        return $this->cod_cliente;
    }

    public function setCodCliente($cod_cliente) {
        $this->cod_cliente = $cod_cliente;
        return $this;
    }

    public function getNome() {
        return $this->nome;
    }

    public function setNome($nome) {
        $this->nome = $nome;
        return $this;
    }

    public function getEndereco() {
        return $this->endereco;
    }

    public function setEndereco($endereco) {
        $this->endereco = $endereco;
        return $this;
    }

    public function getTelefone() {
        return $this->telefone;
    }

    public function setTelefone($telefone) {
        $this->telefone = $telefone;
        return $this;
    }
}

?>