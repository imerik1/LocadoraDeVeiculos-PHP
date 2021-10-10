<?php

namespace Db;

use \PDO;
use \PDOException;
use \Models\Cliente;
use Models\Endereco;

include('ConfiguracaoConexao.php');

class Persiste
{

	public static function AddCliente(Object $cliente)
	{
		try {
			$pdo = new PDO(hostDb, usuario, senha);
			$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
			$pdo->setAttribute(PDO::ATTR_EMULATE_PREPARES, FALSE);

			$stmt = $pdo->prepare("insert into clientes(nome, cpf, telefone) values ($cliente->nome, $cliente->cpf, $cliente->telefone)");
			$stmt->execute();


			$stmt = $pdo->prepare("select id from clientes where cpf = $cliente->cpf");
			$stmt->execute();
			$stmt->setFetchMode(PDO::FETCH_ASSOC);
			$v = $stmt->fetchAll();

			$endereco = $cliente->endereco;

			$id = $v['id'];

			$stmt = $pdo->prepare("insert into enderecos(cliente_id, logradouro, numero, bairro, cidade, estado, cep) values ($id, $endereco->logradouro, $endereco->numero, $endereco->bairro, $endereco->cidade, $endereco->estado, $endereco->cep)");
			$stmt->execute();

			$status = true;
		} catch (PDOException $pex) {
			$status = false;
		} finally {
			$pdo = null;
		}
		return $status;
	}

	public static function GetCliente($cpf)
	{
		try {
			$pdo = new PDO(hostDb, usuario, senha);
			$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
			$pdo->setAttribute(PDO::ATTR_EMULATE_PREPARES, FALSE);

			$stmt = $pdo->prepare("select * from clientes where cpf = $cpf");
			$stmt->execute();
			$stmt->setFetchMode(PDO::FETCH_ASSOC);
			$v = $stmt->fetchAll();
			$id = $v['id'];

			$stmt = $pdo->prepare("select * from enderecos where cliente_id = $id");
			$stmt->execute();
			$stmt->setFetchMode(PDO::FETCH_ASSOC);
			$i = $stmt->fetchAll();

			$endereco = new Endereco($i['id'], $i['logradouro'], $i['numero'], $i['bairro'], $i['cidade'], $i['estado'], $i['cep']);

			$cliente = new Cliente($v['id'], $v['nome'], $v['cpf'], $v['telefone'], $endereco);
		} catch (PDOException $pex) {
			return null;
		} finally {
			$pdo = null;
		}
		return $cliente;
	}
}
