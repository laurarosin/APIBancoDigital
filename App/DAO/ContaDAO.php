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

    public function insert(ContaModel $model) : bool
    {
        $sql = "INSERT INTO conta (Numero,Tipo,Senha,limite,saldo) VALUES (?, ?, ?, ?, ?) ";

        $stmt = $this->conexao->prepare($sql);
        $stmt->bindValue(1, $model->Numero);
        $stmt->bindValue(2, $model->Tipo);
        $stmt->bindValue(3, $model->Senha);
        $stmt->bindValue(4, $model->limite);
        $stmt->bindValue(5, $model->saldo);
        
        return $stmt->execute();
    }

    public function update(ContaModel $model)
    {
        $sql = "UPDATE conta SET Numero=?, Tipo =?, Senha=? limite=? saldo=? WHERE Id=? ";

        $stmt = $this->conexao->prepare($sql);
        $stmt->bindValue(1, $model->Numero);
        $stmt->bindValue(2, $model->Tipo);
        $stmt->bindValue(3, $model->Senha);
        $stmt->bindValue(4, $model->limite);
        $stmt->bindValue(5, $model->saldo);
        $stmt->bindValue(6, $model->Id);
        
        return $stmt->execute();
    }

    public function delete(int $Id) : bool
    {
        $sql = "DELETE FROM conta WHERE Id = ? ";

        $stmt = $this->conexao->prepare($sql);
        $stmt->bindValue(1, $Id);
        return $stmt->execute();
    }
}