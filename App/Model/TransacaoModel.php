<?php

namespace APP\Model;
use APP\DAO\TransacaoDAO;

class TransacaoModel extends Model
{
    public $id, $valor, $data_evento;

    public function save()
    {
        if($this->id == null)
        (new TransacaoDAO())->insert($this);
    else
        (new TransacaoDAO())->update($this);
    }

    public function getAllRows()
    {
        $this->rows = (new TransacaoDAO())->select();
    }
}