<?php

class Fornecedores{

    private $cod_fornecedor;
    private $razao_social;
    private $cnpj;

    public function __construct($razao_social, $cnpj){
        $this->razao_social = $razao_social;
        $this->cnpj = $cnpj;
    }

    public function getCodFornecedor() {
        return $this->cod_fornecedor;
    }

    public function setCodFornecedor($cod_fornecedor) {
        $this->cod_fornecedor = $cod_fornecedor;
        return $this;
    }

    public function getRazaoSocial() {
        return $this->razao_social;
    }

    public function setRazaoSocial($razao_social) {
        $this->razao_social = $razao_social;
        return $this;
    }

    public function getCnpj() {
        return $this->cnpj;
    }

    public function setCnpj($cnpj) {
        $this->cnpj = $cnpj;
        return $this;
    }
}

?>