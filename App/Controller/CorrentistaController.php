<?php

namespace APP\Controller;

use APP\Model\{ChavePixModel, ContaModel, CorrentistaModel, TransacaoModel};
use Exception;

class CorrentistaController extends Controller 
{
    public static function salvar():void 
    {
        try
        {
            $json_obj = json_decode(file_get_contents('php://input'));

            $model = new CorrentistaModel();
            $model->Id_Correntista = $json_obj->Id_Correntista;
            $model->Nome = $json_obj->Nome;
            $model->CPF = $json_obj->CPF;
            $model->data_nasc = $json_obj->data_nasc;
            $model-> Senha = $json_obj ->Senha;           

            parent::getResponseAsJSON($model->save());

        }catch(Exception $e)
        {
            parent::getExceptionAsJSON($e);
        }
    }

    public static function entrar():void
    {
        try
        {
            $model = new CorrentistaModel();

            $data = json_decode(file_get_contents('php://input'));

            $model = new CorrentistaModel();
          //  parent::getResponseAsJSON($model->getByCpfAndSenha($data->CPF, $data->Senha)); 
             parent::getResponseAsJSON($model->rows);
        }catch(Exception $e)
        {
            parent::getExceptionAsJSON($e);
        }
    }

}