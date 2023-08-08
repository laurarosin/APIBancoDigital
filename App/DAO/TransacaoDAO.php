<?php

namespace APP\DAO;

use APP\Model\TransacaoModel;

class TransacaoDAO extends DAO
{
    public function __construct()
    {
        parent::__construct();
    }

    public function select()
    {
        $sql = "SELECT * FROM transacao";

        $stmt = $this->conexao->prepare($sql);
        $stmt->execute();

        return $stmt->fetchAll(DAO::FETCH_CLASS);
    }

    public function insert(TransacaoModel $m) : bool
    {
        $sql = "INSERT INTO transacao (Valor,Data_evento) VALUES (?, ?) ";

        $stmt = $this->conexao->prepare($sql);
        $stmt->bindValue(1, $m->Valor);
        $stmt->bindValue(2, $m->Data_evento);

        return $stmt->execute();
    }

    public function update(TransacaoModel $m)
    {
        $sql = "UPDATE transacao SET Valor=?, Data_evento=? WHERE Id=? ";

        $stmt = $this->conexao->prepare($sql);
        $stmt->bindValue(1, $m->Valor);
        $stmt->bindValue(2, $m->Data_evento);
        $stmt->bindValue(3, $m->Id);
        
        return $stmt->execute();
    }

    public function delete(int $Id) : bool
    {
        $sql = "DELETE FROM transacao WHERE Id = ? ";

        $stmt = $this->conexao->prepare($sql);
        $stmt->bindValue(1, $Id);
        return $stmt->execute();
    }
}