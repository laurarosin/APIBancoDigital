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
        $sql = "INSERT INTO ChavePix (chave,tipo,id_conta) VALUES (?, ?, ?) ";

        $stmt = $this->conexao->prepare($sql);
        $stmt->bindValue(1, $m->chave);
        $stmt->bindValue(2, $m->tipo);
        $stmt->bindValue(3, $m->id_conta);

        return $stmt->execute();
    }

    public function update(ChavePixModel $m)
    {
        $sql = "UPDATE ChavePix SET chave=?, tipo =?, id_conta=? WHERE id=? ";

        $stmt = $this->conexao->prepare($sql);
        $stmt->bindValue(1, $m->chave);
        $stmt->bindValue(2, $m->tipo);
        $stmt->bindValue(3, $m->id_conta);
        $stmt->bindValue(4, $m->id);
        
        return $stmt->execute();
    }

    public function delete(int $id) : bool
    {
        $sql = "DELETE FROM ChavePix WHERE id = ? ";

        $stmt = $this->conexao->prepare($sql);
        $stmt->bindValue(1, $id);
        return $stmt->execute();
    }
}