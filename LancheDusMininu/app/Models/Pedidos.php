<?php
namespace App\Models;
use Illuminate\Support\Facades\DB;

class Pedidos {
    private $cod_pedido;
    private $cod_cliente;
    private $preco_total;
    private $data_pedido;

    public function __construct($cod_cliente, $preco_total, $data_pedido) {
        $this->cod_cliente = $cod_cliente;
        $this->preco_total = $preco_total;
        $this->data_pedido = $data_pedido;
    }

     public function gravar(){
        DB::insert('INSERT INTO pedidos (cod_cliente, preco_total, data_pedido) VALUES (?, ?, ?)', 
               [$this->cod_cliente, $this->preco_total, $this->data_pedido]);
    }


    public function getCodPedido() {
        return $this->cod_pedido;
    }

    public function setCodPedido($cod_pedido) {
        $this->cod_pedido = $cod_pedido;
        return $this;
    }

    public function getCodCliente() {
        return $this->cod_cliente;
    }

    public function setCodCliente($cod_cliente) {
        $this->cod_cliente = $cod_cliente;
        return $this;
    }

    public function getPrecoTotal() {
        return $this->preco_total;
    }

    public function setPrecoTotal($preco_total) {
        $this->preco_total = $preco_total;
        return $this;
    }

    public function getDataPedido() {
        return $this->data_pedido;
    }

    public function setDataPedido($data_pedido) {
        $this->data_pedido = $data_pedido;
        return $this;
    }
}
?>