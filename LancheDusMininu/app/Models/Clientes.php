<?php
namespace App\Models;

use Illuminate\Support\Facades\DB;

class Clientes {

    private $cod_cliente;
    private $nome;
    private $endereco;
    private $numeroEndereco;
    private $telefone;


    public function __construct($nome, $endereco, $numeroEndereco, $telefone){
        $this->nome = $nome;
        $this->endereco = $endereco;     
        $this->numeroEndereco = $numeroEndereco;  
        $this->telefone = $telefone;
    }

    public function gravar(){
        DB::insert('INSERT INTO clientes (nome, endereco, numero_casa, telefone) VALUES (?, ?, ?, ?)', 
                  [$this->nome, $this->endereco, $this->numeroEndereco, $this->telefone]);
    }

    public function excluir(){
        DB::delete('DELETE FROM clientes WHERE cod_cliente = ?', [$this->cod_cliente]);
    }

    public function alterar(){
        DB::delete('UPDATE clientes SET nome=?,endereco=?,numero_casa=?,telefone=? WHERE cod_cliente = ?', 
                  [$this->nome, $this->endereco, $this->numeroEndereco, $this->telefone, $this->cod_cliente]);
    }

   public function getCodCliente() {
        return $this->cod_cliente;
    }

    public function setCodCliente($cod_cliente) {
        $this->cod_cliente = $cod_cliente;
    }

    public function getNome() {
        return $this->nome;
    }

    public function setNome($nome) {
        $this->nome = $nome;
    }

    public function getEndereco() {
        return $this->endereco;
    }

    public function setEndereco($endereco) {
        $this->endereco = $endereco;
    }

    public function getnumeroEndereco() {
        return $this->numeroEndereco;
    }

    public function setnumeroEndereco($numeroEndereco) {
        $this->numeroEndereco = $numeroEndereco;
    }

    public function getTelefone() {
        return $this->telefone;
    }

    public function setTelefone($telefone) {
        $this->telefone = $telefone;
    }
}

?>