<?php
namespace App\Models;
use Illuminate\Support\Facades\DB;


class Pratos {
    private $cod_prato;
    private $titulo;
    private $descricao;
    private $valor_unitario;
    private $imagem;

    public function __construct($descricao, $valor_unitario, $titulo) {
        $this->descricao = $descricao;
        $this->valor_unitario = $valor_unitario;
        $this->titulo = $titulo;
    }

    public function gravar(){
        DB::insert('INSERT INTO pratos(descricao, valor_unitario, imagem, titulo) VALUES (?, ?, ?, ?)', 
                  [$this->descricao, $this->valor_unitario, $this->imagem, $this->titulo]);
    }

    public function excluir(){
        DB::delete('DELETE FROM pratos WHERE cod_prato = ?', [$this->cod_prato]);
    }

    public function alterar(){
    DB::update('UPDATE pratos SET descricao=?, valor_unitario=? WHERE cod_prato = ?', 
              [$this->descricao, $this->valor_unitario, $this->cod_prato]);
} 

    public function listar(){
        $lista = DB::select('SELECT * FROM PRATOS ORDER BY cod_prato desc');
        return $lista;
    }

    public function getCodPrato() {
        return $this->cod_prato;
    }

    public function setCodPrato($cod_prato) {
        $this->cod_prato = $cod_prato;
        return $this;
    }

    public function getDescricao() {
        return $this->descricao;
    }

    public function setTitulo($titulo) {
        $this->titulo = $titulo;
        return $this;
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

    public function setImagem($imagem) {
        $this->imagem = $imagem;
        return $this;
    }
}
?>