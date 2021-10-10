<?php

namespace Models;

class Endereco
{
    private $id;
    private $logradouro;
    private $numero;
    private $bairro;
    private $cidade;
    private $estado;
    private $cep;

    public function __set($atrib, $value)
    {
        $this->$atrib = $value;
    }

    public function __get($atrib)
    {
        return $this->$atrib;
    }

    public function __construct($id, $logradouro, $numero, $bairro, $cidade, $estado, $cep)
    {
        $this->id = $id;
        $this->logradouro = $logradouro;
        $this->numero = $numero;
        $this->bairro = $bairro;
        $this->cidade = $cidade;
        $this->estado = $estado;
        $this->cep = $cep;
    }

    public function toJson()
    {
        return json_encode([
            'id' => $this->id,
            'logradouro' => $this->logradouro,
            'numero' => $this->numero,
            'bairro' => $this->bairro,
            'cidade' => $this->cidade,
            'estado' => $this->estado,
            'cep' => $this->cep,
        ]);
    }

    public static function toJsonEstatico(
        $id,
        $logradouro,
        $numero,
        $bairro,
        $cidade,
        $estado,
        $cep
    ) {
        return json_encode([
            'id' => $id,
            'logradouro' => $logradouro,
            'numero' => $numero,
            'bairro' => $bairro,
            'cidade' => $cidade,
            'estado' => $estado,
            'cep' => $cep,
        ]);
    }

    public function toString()
    {
        return $this->id .
            ' ' .
            $this->logradouro .
            ' ' .
            $this->numero .
            ' ' .
            $this->bairro .
            ' ' .
            $this->cidade .
            ' ' .
            $this->estado .
            ' ' .
            $this->cep;
    }

    use trait__get;
}
