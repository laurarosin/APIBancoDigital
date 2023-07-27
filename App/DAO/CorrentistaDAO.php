<?php

namespace APP\DAO;

use APP\Model\CorrentistaModel;

class CorrentistaDAO extends DAO
{
    public function __construct()
    {
        parent::__construct();
    }

    public function select()
    {
        $sql = "SELECT * FROM correntista ";

        $stmt = $this->conexao->prepare($sql);
        $stmt->execute();

        return $stmt->fetchAll(DAO::FETCH_CLASS);
    }

    public function insert(CorrentistaModel $m) : bool
    {
        $sql = "INSERT INTO correntista (nome,cpf,data_nasc,senha,limite,saldo) VALUES (?, ?, ?, ?,?,?) ";

        $stmt = $this->conexao->prepare($sql);
        $stmt->bindValue(1, $m->nome);
        $stmt->bindValue(2, $m->cpf);
        $stmt->bindValue(3, $m->data_nasc);
        $stmt->bindValue(4, $m->senha);
        $stmt->bindValue(5, $m->limite);
        $stmt->bindValue(6, $m->saldo);



        return $stmt->execute();
    }

    public function update(CorrentistaModel $m)
    {
        $sql = "UPDATE correntista SET nome=?, cpf =?, data_nasc=? senha=? limite=? saldo=? WHERE id=? ";

        $stmt = $this->conexao->prepare($sql);
        $stmt->bindValue(1, $m->nome);
        $stmt->bindValue(2, $m->cpf);
        $stmt->bindValue(3, $m->data_nasc);
        $stmt->bindValue(4, $m->senha);
        $stmt->bindValue(5, $m->limite);
        $stmt->bindValue(6, $m->saldo);
        $stmt->bindValue(7, $m->id);

        
        return $stmt->execute();
    }

    public function delete(int $id) : bool
    {
        $sql = "DELETE FROM correntista WHERE id = ? ";

        $stmt = $this->conexao->prepare($sql);
        $stmt->bindValue(1, $id);
        return $stmt->execute();
    }
}