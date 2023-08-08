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

    public function select()
    {
        $sql = "SELECT * FROM ChavePix ";

        $stmt = $this->conexao->prepare($sql);
        $stmt->execute();

        return $stmt->fetchAll(DAO::FETCH_CLASS);
    }

    public function insert(ChavePixModel $m) : bool
    {
        $sql = "INSERT INTO ChavePix (Chave,Tipo,Id_Conta) VALUES (?, ?, ?) ";

        $stmt = $this->conexao->prepare($sql);
        $stmt->bindValue(1, $m->Chave);
        $stmt->bindValue(2, $m->Tipo);
        $stmt->bindValue(3, $m->Id_Conta);

        return $stmt->execute();
    }

    public function update(ChavePixModel $m)
    {
        $sql = "UPDATE ChavePix SET Chave=?, Tipo =?, Id_Conta=? WHERE id=? ";

        $stmt = $this->conexao->prepare($sql);
        $stmt->bindValue(1, $m->Chave);
        $stmt->bindValue(2, $m->Tipo);
        $stmt->bindValue(3, $m->Id_Conta);
        $stmt->bindValue(4, $m->Id);
        
        return $stmt->execute();
    }

    public function delete(int $Id) : bool
    {
        $sql = "DELETE FROM ChavePix WHERE Id = ? ";

        $stmt = $this->conexao->prepare($sql);
        $stmt->bindValue(1, $Id);
        return $stmt->execute();
    }
}