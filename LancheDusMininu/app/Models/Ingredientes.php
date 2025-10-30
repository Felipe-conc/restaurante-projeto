<?php
namespace App\Models;
use Illuminate\Support\Facades\DB;

class Ingredientes {
    private $cod_ingrediente;
    private $descricao;
    private $valor_unitario;

    public function __construct($descricao, $valor_unitario) {
        $this->descricao = $descricao;
        $this->valor_unitario = $valor_unitario;
    }

    public function gravar(){
        DB::insert('INSERT INTO ingredientes (descricao, valor_unitario) VALUES (?, ?)', 
               [$this->descricao, $this->valor_unitario]);
    }

    public function excluir(){
        DB::delete('DELETE FROM ingredientes WHERE cod_ingrediente = ?', [$this->cod_ingrediente]);
    }

    public function alterar(){
        DB::delete('UPDATE ingredientes SET descricao = ?,valor_unitario = ? WHERE cod_ingrediente = ?', 
                  [$this->descricao, $this->valor_unitario, $this->cod_ingrediente]);
    }   

    public function getCodIngrediente() {
        return $this->cod_ingrediente;
    }

    public function setCodIngrediente($cod_ingrediente) {
        $this->cod_ingrediente = $cod_ingrediente;
        return $this;
    }

    public function getDescricao() {
        return $this->descricao;
    }

    public function setDescricao($descricao) {
        $this->descricao = $descricao;
        return $this;
    }

    public function getValorUnitario() {
        return $this->valor_unitario;
    }

    public function setValorUnitario($valor_unitario) {
        $this->valor_unitario = $valor_unitario;
        return $this;
    }
}
?>
