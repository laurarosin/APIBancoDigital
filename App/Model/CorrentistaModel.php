<?php

namespace APP\Model;

use APP\DAO\ContaDAO;
use APP\DAO\CorrentistaDAO; 

class CorrentistaModel extends Model
{
    public $Id_Correntista, $Nome, $CPF, $data_nasc, $Senha;
    public $rows_contas;

    public function save(): ?CorrentistaModel
    {
         $dao_correntista = new CorrentistaDAO();
        
        $model_preenchido = $dao_correntista->save($this);

        if($this->Id_Correntista == null)
        {
            $dao_conta = new ContaDAO();

            //abrindo conta corrente
            $conta_corrente = new ContaModel();
            $conta_corrente->Id_Correntista = $model_preenchido->Id_Correntista;
            $conta_corrente->saldo=0;
            $conta_corrente->limite=100;
            $conta_corrente->Tipo= 'C';
            $conta_corrente = $dao_conta->insert($conta_corrente);

            $model_preenchido->rows_contas[] = $conta_corrente;

            //abrindo conta poupança
            $conta_poupanca = new ContaModel();
            $conta_poupanca->Id_Correntista = $model_preenchido->Id_Correntista;
            $conta_poupanca->saldo = 0;
            $conta_poupanca->limite = 0;
            $conta_poupanca->Tipo = 'p';
            $conta_poupanca = $dao_conta->insert($conta_poupanca);

            $model_preenchido->rows_contas[] = $conta_poupanca;
        }
        return $model_preenchido;
    }  

     public function getAllRows()
    {
        $this->rows = (new CorrentistaDAO())->select();
    }

    public function getByCpfAndSenha($CPF, $Senha) : CorrentistaModel
    {
        return (new CorrentistaDAO())->selectByCpfAndSenha($CPF, $Senha);
    }
    
}

