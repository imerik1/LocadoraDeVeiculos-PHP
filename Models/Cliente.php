<?php

namespace Models;

class Cliente
{
    private $id;
    private $nome;
    private $cpf;
    private $telefone;
    private $endereco;

    public function __set($atrib, $value)
    {
        $this->$atrib = $value;
    }

    public function __get($atrib)
    {
        return $this->$atrib;
    }

    public function __construct($id, $nome, $cpf, $telefone, $endereco)
    {
        $this->id = $id;
        $this->nome = $nome;
        $this->cpf = $cpf;
        $this->telefone = $telefone;
        $this->endereco = $endereco;
    }

    public function toJson()
    {
        return json_encode([
            'id' => $this->id,
            'nome' => $this->nome,
            'cpf' => $this->cpf,
            'telefone' => $this->telefone,
            'endereco' => $this->endereco,
        ]);
    }

    public static function toJsonEstatico(
        $id,
        $nome,
        $cpf,
        $telefone,
        $endereco
    ) {
        return json_encode([
            'id' => $id,
            'nome' => $nome,
            'cpf' => $cpf,
            'telefone' => $telefone,
            'endereco' => $endereco,
        ]);
    }

    public function toString()
    {
        return $this->id .
            ' ' .
            $this->nome .
            ' ' .
            $this->cpf .
            ' ' .
            $this->telefone .
            ' ' .
            $this->endereco;
    }

    use trait__get;
}
