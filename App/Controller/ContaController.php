<?php

namespace APP\Controller;

use APP\Model\{ChavePixModel, ContaModel, CorrentistaModel, TransacaoModel};
use Exception;

class ContaController extends Controller
{
    public static function enviar(): void
    {
        try
        {
            $json_obj = json_decode(file_get_contents('php://input'));

            $model = new ContaModel();
            $model->Id= $json_obj->Id;
            $model->Numero= $json_obj->Numero;
            $model->Tipo= $json_obj->Tipo;
            $model->Senha-> $json_obj->Senha;
            $model-> limite = $json_obj ->limite;
            $model-> saldo = $json_obj ->saldo;

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
            $model = new CorrentistaModel();

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
            $model = new CorrentistaModel();

            $model->getAllRows();

            parent::getResponseAsJSON($model->rows);
        }catch(Exception $e)
        {
            parent::getExceptionAsJSON($e);
        }
    }
    public static function fechar()
    {

    }

    public static function abrir()
    {
        
    }

}