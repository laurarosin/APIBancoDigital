<?php

namespace APP\DAO;

use APP\Model\ChavePixModel;
use PDO;

class ChavePixDAO extends DAO
{
    public function __construct()
    {
        parent::__construct();
    }

    public function save(ChavePixModel $model) : ?ChavePixModel
    {
        return ($model->Id==null) ? $this->insert($model) : $this->update($model);
    }

    public function select(int $Id_Correntista)
    {
        $sql = "SELECT * FROM ChavePix 
        Join Conta c ON (c.Id_Conta = cp.Id_Conta)
        WHERE c.Id_Correntista=?";

        $stmt= $this->conexao->prepare($sql);
        $stmt->bindValue(1, $Id_Correntista);
        $stmt->execute();

        return $stmt->fetchAll(PDO::FETCH_CLASS);

       
    }

    public function insert(ChavePixModel $model) : bool
    {
        $sql = "INSERT INTO ChavePix (Chave,Tipo,Id_Conta) VALUES (?, ?, ?) ";

        $stmt = $this->conexao->prepare($sql);
        $stmt->bindValue(1, $model->Chave);
        $stmt->bindValue(2, $model->Tipo);
        $stmt->bindValue(3, $model->Id_Conta);

        return $stmt->execute();
    }

    public function update(ChavePixModel $model) : ?ChavePixModel
    {
        $sql = "UPDATE ChavePix SET Chave=?, Tipo =?, Id_Conta=? WHERE Id=? ";

        $stmt = $this->conexao->prepare($sql);
        $stmt->bindValue(1, $model->Chave);
        $stmt->bindValue(2, $model->Tipo);
        $stmt->bindValue(3, $model->Id_Conta);
        $stmt->bindValue(4, $model->Id);
        
        return $stmt->execute();

        $model->Id = $this->conexao->LastInsertId();

        return $model;
    }

    public function delete(ChavePixModel $model) : bool
    {
        $sql = "DELETE FROM ChavePix WHERE Id = ? AND Id_Conta=? ";

        $stmt = $this->conexao->prepare($sql);
        $stmt->bindValue(1,$model->Id);
        $stmt->bindValue(1, $model->Id_Conta);
        return $stmt->execute();
    }
}