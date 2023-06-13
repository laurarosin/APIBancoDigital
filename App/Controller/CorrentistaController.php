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
            $model->id = $json_obj->id;
            $model->nome = $json_obj->nome;
            $model->cpf = $json_obj->CPF;
            $model->data_nasc = $json_obj->data_nasc;
            $model-> senha = $json_obj ->senha;

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