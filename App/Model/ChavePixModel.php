<?php

namespace APP\Model;
use APP\DAO\ChavePixDAO;

class ChavePixModel extends Model
{
    public $Id, $Chave, $Tipo, $Id_Conta;

    public function save()
    {
        if($this->Id == null)
        (new ChavePixDAO())->insert($this);
    else
        (new ChavePixDAO())->update($this);
    }

    public function getAllRows()
    {
        $this->rows = (new ChavePixDAO())->select();
    }
}