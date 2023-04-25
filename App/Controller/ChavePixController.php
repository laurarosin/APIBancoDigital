<?php

namespace APP\Controller;

use APP\Model\{ChavePixModel, ContaModel, CorrentistaModel, TransacaoModel};
use Exception;

class ChavePixController extends Controller
{
    public static function enviar(): void
    {
        try
        {
            $json_obj = json_decode(file_get_contents('php://input'));

            $model = new ChavePixModel();
            $model->id= $json_obj->Id;
            $model->chave= $json_obj->Chave;
            $model->tipo= $json_obj->Tipo;
            $model->id_conta-> $json_obj->Id_conta;

            $model->save();
        }catch(Exception $e)
        {
            parent::getExceptionAsJSON($e);
        }
    }

    public static function receber():void
    {
        try
        {
            $model = new ChavePixModel();

            $model->getAllRows();

            parent::getResponseAsJSON($model->rows);
        }catch(Exception $e)
        {
            parent::getExceptionAsJSON($e);
        }
    }

    public static function extrato():void
    {
        try
        {
            $model = new ChavePixModel();

            $model->getAllRows();

            parent::getResponseAsJSON($model->rows);
        }catch(Exception $e)
        {
            parent::getExceptionAsJSON($e);
        }
    }

}