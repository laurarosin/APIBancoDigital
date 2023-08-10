<?php

namespace APP\Model;
use APP\DAO\ChavePixDAO;

class ChavePixModel extends Model
{
    public $Id, $Chave, $Tipo, $Id_Conta;

    public function save() : ?ChavePixModel
    {
        return (new ChavePixDAO())->save($this);
    }

    public function getAllRows(int $Id_Correntista) : array
    {
        return (new ChavePixDAO())->select($Id_Correntista);
    }

    public function remove() : bool
    {
        return (new ChavePixDAO())->delete($this);
    }
}