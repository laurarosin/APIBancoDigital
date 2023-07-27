<?php

namespace APP\Model;

use APP\DAO\ContaDAO;
use APP\DAO\CorrentistaDAO; 

class CorrentistaModel extends Model
{
    public $id, $nome, $cpf, $data_nasc, $senha;

    public function save(): ?CorrentistaModel
    {
         $dao_correntista = new CorrentistaDAO();
        
        $model_preenchido = $dao_correntista->save($this);

        if($this->id == null)
        {
            $dao_conta = new ContaDAO();

            //abrindo conta corrente
            $conta_corrente = new ContaModel();
            $conta_corrente->id_correntista = $model_preenchido->id;
            $conta_corrente->saldo=0;
            $conta_corrente->limite=100;
            $conta_corrente->tipo= 'C';
            $conta_corrente = $dao_conta->insert($conta_corrente);

            $model_preenchido->rows_contas[] = $conta_corrente;

            //abrindo conta poupança
            $conta_poupanca = new ContaModel();
            $conta_poupanca->id_correntista = $model_preenchido->id;
            $conta_poupanca->saldo = 0;
            $conta_poupanca->limite = 0;
            $conta_poupanca->tipo = 'p';
            $conta_poupanca = $dao_conta->insert($conta_poupanca);

            $model_preenchido->rows_conta[] = $conta_poupanca;
        }
        return $model_preenchido;
    }  

     public function getAllRows()
    {
        $this->rows = (new CorrentistaDAO())->select();
    }


}

