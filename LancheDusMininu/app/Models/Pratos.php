<?php
class Pratos {
    private $cod_prato;
    private $descricao;
    private $valor_unitario;

    public function __construct($descricao, $valor_unitario) {
        $this->descricao = $descricao;
        $this->valor_unitario = $valor_unitario;
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