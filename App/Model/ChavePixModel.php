<?php

namespace APP\Model;
use APP\DAO\ChavePixDAO;

class ChavePixModel extends Model
{
    public $id, $chave, $tipo, $id_conta;

    public function save()
    {
        if($this->id == null)
        (new ChavePixDAO())->insert($this);
    else
        (new ChavePixDAO())->update($this);
    }

    public function getAllRows()
    {
        $this->rows = (new ChavePixDAO())->select();
    }
}