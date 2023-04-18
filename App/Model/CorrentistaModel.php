<?php

namespace APP\Model;

use APP\DAO\CorrentistaDAO; 

class CorrentistaModel extends Model
{
    public $id, $nome, $cpf, $data_nasc;

    public function save()
    {
        if($this->id == null)
        (new CorrentistaDAO())->insert($this);
    else
        (new CorrentistaDAO())->update($this);
    }

    public function getAllRows()
    {
        $this->rows = (new CorrentistaDAO())->select();
    }
}

