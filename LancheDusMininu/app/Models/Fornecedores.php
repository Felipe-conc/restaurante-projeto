<?php
namespace App\Models;
use Illuminate\Support\Facades\DB;

class Fornecedores{

    private $cod_fornecedor;
    private $razao_social;
    private $cnpj;

    public function __construct($razao_social, $cnpj){
        $this->razao_social = $razao_social;
        $this->cnpj = $cnpj;
    }

    public function gravar(){
        DB::insert('INSERT INTO fornecedores (razao_social, cnpj) VALUES (?, ?)', 
                [$this->razao_social, $this->cnpj]);
    }

    public function excluir(){
        DB::delete('DELETE FROM fornecedores WHERE cod_fornecedor = ?', [$this->cod_fornecedor]);
    }

    public function alterar(){
        DB::delete('UPDATE fornecedores SET razao_social = ?,cnpj = ? WHERE cod_fornecedor = ?', 
                  [$this->razao_social, $this->cnpj, $this->cod_fornecedor]);
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