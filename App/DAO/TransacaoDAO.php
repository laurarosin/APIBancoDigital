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
        $sql = "INSERT INTO transacao (valor,data_evento) VALUES (?, ?) ";

        $stmt = $this->conexao->prepare($sql);
        $stmt->bindValue(1, $m->valor);
        $stmt->bindValue(2, $m->data_evento);

        return $stmt->execute();
    }

    public function update(TransacaoModel $m)
    {
        $sql = "UPDATE transacao SET valor=?, data_evento=? WHERE id=? ";

        $stmt = $this->conexao->prepare($sql);
        $stmt->bindValue(1, $m->valor);
        $stmt->bindValue(2, $m->data_evento);
        $stmt->bindValue(3, $m->id);
        
        return $stmt->execute();
    }

    public function delete(int $id) : bool
    {
        $sql = "DELETE FROM transacao WHERE id = ? ";

        $stmt = $this->conexao->prepare($sql);
        $stmt->bindValue(1, $id);
        return $stmt->execute();
    }
}