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
            $model->id= $json_obj->Id;
            $model->nome= $json_obj->Nome;
            $model->cpf= $json_obj->CPF;
            $model->data_nasc-> $json_obj->Data_Nasc;

            $model->save();
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

            $model->getAllRows();

            parent::getResponseAsJSON($model->rows);
        }catch(Exception $e)
        {
            parent::getExceptionAsJSON($e);
        }
    }

}