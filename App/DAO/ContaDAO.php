<?php

namespace APP\DAO;

use APP\Model\ContaModel;

class ContaDAO extends DAO
{
    public function __construct()
    {
        parent::__construct();
    }

    public function select()
    {
        $sql = "SELECT * FROM conta ";

        $stmt = $this->conexao->prepare($sql);
        $stmt->execute();

        return $stmt->fetchAll(DAO::FETCH_CLASS);
    }

    public function insert(ContaModel $m) : bool
    {
        $sql = "INSERT INTO conta (numero,tipo,senha,limite,saldo) VALUES (?, ?, ?, ?, ?) ";

        $stmt = $this->conexao->prepare($sql);
        $stmt->bindValue(1, $m->numero);
        $stmt->bindValue(2, $m->tipo);
        $stmt->bindValue(3, $m->senha);
        $stmt->bindValue(4, $m->limite);
        $stmt->bindValue(5, $m->saldo);
        
        return $stmt->execute();
    }

    public function update(ContaModel $m)
    {
        $sql = "UPDATE conta SET numero=?, tipo =?, senha=? limite=? saldo=? WHERE id=? ";

        $stmt = $this->conexao->prepare($sql);
        $stmt->bindValue(1, $m->numero);
        $stmt->bindValue(2, $m->tipo);
        $stmt->bindValue(3, $m->senha);
        $stmt->bindValue(4, $m->limite);
        $stmt->bindValue(5, $m->saldo);
        $stmt->bindValue(6, $m->id);
        
        return $stmt->execute();
    }

    public function delete(int $id) : bool
    {
        $sql = "DELETE FROM conta WHERE id = ? ";

        $stmt = $this->conexao->prepare($sql);
        $stmt->bindValue(1, $id);
        return $stmt->execute();
    }
}