<?php

namespace APP\DAO;

use APP\Model\CorrentistaModel;

class CorrentistaDAO extends DAO
{
    public function __construct()
    {
        parent::__construct();
    }

    public function save(CorrentistaModel $m) : CorrentistaModel
    {
        return ($m->Id_Correntista == null) ? $this->insert($m) : $this->update($m);
    }

    public function select()
    {
        $sql = "SELECT * FROM correntista ";

        $stmt = $this->conexao->prepare($sql);
        $stmt->execute();

        return $stmt->fetchAll(DAO::FETCH_CLASS);
    }

    public function insert(CorrentistaModel $model)
    {
        $sql = "INSERT INTO correntista (Nome,CPF,data_nasc,Senha) VALUES (?, ?, ?, ?) ";

        $stmt = $this->conexao->prepare($sql);
        $stmt->bindValue(1, $model->Nome);
        $stmt->bindValue(2, $model->CPF);
        $stmt->bindValue(3, $model->data_nasc);
        $stmt->bindValue(4, $model->Senha);

        $stmt->execute();

        $model->Id_Correntista = $this->conexao->lastInsertId();

        return $model;

        
    }

   public function update(CorrentistaModel $m)
    {
        $sql = "UPDATE correntista SET Nome=?, CPF =?, data_nasc=?, Senha=? WHERE Id_Correntista=? ";

        $stmt = $this->conexao->prepare($sql);
        $stmt->bindValue(1, $m->Nome);
        $stmt->bindValue(2, $m->CPF);
        $stmt->bindValue(3, $m->data_nasc);
        $stmt->bindValue(4, $m->Senha);
        $stmt->bindValue(5, $m->Id_Correntista);

        return $stmt->execute();
    }

    public function delete(int $Id) : bool
    {
        $sql = "DELETE FROM correntista WHERE id = ? ";

        $stmt = $this->conexao->prepare($sql);
        $stmt->bindValue(1, $Id);
        return $stmt->execute();
    }

    public function selectByCpfAndSenha($CPF, $Senha) : CorrentistaModel
    {
        $sql = "SELECT * FROM correntista WHERE CPF = ? AND Senha = sha1(?) ";

        $stmt = $this->conexao->prepare($sql);
        $stmt->bindValue(1, $CPF);
        $stmt->bindValue(2, $Senha);
        $stmt->execute();

        $obj = $stmt->fetchObject("App\Model\CorrentistaModel");
        return is_object($obj) ? $obj : new CorrentistaModel();
    }
}