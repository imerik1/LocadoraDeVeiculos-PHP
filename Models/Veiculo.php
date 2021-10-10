<?php

namespace Models;

class Veiculo
{
    private $id;
    private $preco;
    private $placa;
    private $modelo;
    private $marca;
    private $ano;

    public function __set($atrib, $value)
    {
        $this->$atrib = $value;
    }

    public function __get($atrib)
    {
        return $this->$atrib;
    }

    public function __construct($id, $preco, $placa, $modelo, $marca, $ano)
    {
        $this->id = $id;
        $this->preco = $preco;
        $this->placa = $placa;
        $this->modelo = $modelo;
        $this->marca = $marca;
        $this->ano = $ano;
    }

    public function toJson()
    {
        return json_encode([
            'id' => $this->id,
            'preco' => $this->preco,
            'placa' => $this->placa,
            'modelo' => $this->modelo,
            'marca' => $this->marca,
            'ano' => $this->ano
        ]);
    }

    public static function toJsonEstatico(
        $id,
        $preco,
        $placa,
        $modelo,
        $marca,
        $ano
    ) {
        return json_encode([
            'id' => $id,
            'preco' => $preco,
            'placa' => $placa,
            'modelo' => $modelo,
            'marca' => $marca,
            'ano' => $ano
        ]);
    }

    public function toString()
    {
        return $this->id .
            ' ' .
            $this->preco .
            ' ' .
            $this->placa .
            ' ' .
            $this->modelo .
            ' ' .
            $this->marca .
            ' ' .
            $this->ano;
    }

    use trait__get;
}
