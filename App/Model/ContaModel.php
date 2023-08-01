<?php

namespace APP\Model;
use APP\DAO\ContaDAO;

class ContaModel extends Model
{
    public $id, $id_correntista,$numero, $tipo, $senha, $limite, $saldo;

    public function save()
    {
        $dao= new ContaDAO();

         if(empty($this->id))
         {
            $dao->insert($this);

         }
         else 
         {
            $dao->update($this);
         }
        
    }

    public function getAllRows()
    {
        $this->rows = (new ContaDAO())->select();
    }
}
