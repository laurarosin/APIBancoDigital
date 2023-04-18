<?php

namespace APP\Model;
use APP\DAO\ContaDAO;

class ContaModel extends Model
{
    public $id, $numero, $tipo, $senha;

    public function save()
    {
        if($this->id == null)
        (new ContaDAO())->insert($this);
    else
        (new ContaDAO())->update($this);
    }

    public function getAllRows()
    {
        $this->rows = (new ContaDAO())->select();
    }
}
