<?php

namespace APP\Model;
use APP\DAO\ContaDAO;

class ContaModel extends Model
{
    public $Id, $Id_Correntista,$Numero, $Tipo, $Senha, $limite, $saldo;

    public function save()
    {
        $dao= new ContaDAO();

         if(empty($this->Id))
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
