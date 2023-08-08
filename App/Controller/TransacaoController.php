<?php

namespace APP\Controller;

use APP\Model\{ChavePixModel, ContaModel, CorrentistaModel, TransacaoModel};
use Exception;

class TransacaoController extends Controller
{
    public static function enviar(): void
    {
        try
        {
            $json_obj = json_decode(file_get_contents('php://input'));

            $model = new TransacaoModel(); 
            $model->Id= $json_obj->Id;
            $model->Valor= $json_obj->Valor;
            $model->Data_evento= $json_obj->Data_evento;
           
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
            $model = new TransacaoModel();

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
            $model = new TransacaoModel();

            $model->getAllRows();

            parent::getResponseAsJSON($model->rows);
        }catch(Exception $e)
        {
            parent::getExceptionAsJSON($e);
        }
    }

}