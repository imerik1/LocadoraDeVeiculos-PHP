<?php

namespace Models;

class Pagamento
{
    private $id;
    private $cliente;
    private $veiculo;
    private $preco;
    private $dataPagamento;

    public function __set($atrib, $value)
    {
        $this->$atrib = $value;
    }

    public function __get($atrib)
    {
        return $this->$atrib;
    }

    public function __construct($id, $cliente, $veiculo, $preco, $dataPagamento)
    {
        $this->id = $id;
        $this->cliente = $cliente;
        $this->veiculo = $veiculo;
        $this->preco = $preco;
        $this->dataPagamento = $dataPagamento;
    }

    public function toJson()
    {
        return json_encode([
            'id' => $this->id,
            'preco' => $this->preco,
            'veiculo' => $this->veiculo,
            'preco' => $this->preco,
            'dataPagamento' => $this->dataPagamento
        ]);
    }

    public static function toJsonEstatico(
        $id,
        $cliente,
        $veiculo,
        $preco,
        $dataPagamento
    ) {
        return json_encode([
            'id' => $id,
            'cliente' => $cliente,
            'veiculo' => $veiculo,
            'preco' => $preco,
            'dataPagamento' => $dataPagamento
        ]);
    }

    public function toString()
    {
        return $this->id .
            ' ' .
            $this->cliente .
            ' ' .
            $this->veiculo .
            ' ' .
            $this->preco .
            ' ' .
            $this->dataPagamento;
    }

    use trait__get;
}
