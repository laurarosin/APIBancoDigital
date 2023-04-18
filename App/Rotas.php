<?php

use APP\Controller\{
    CorrentistaController,
    ChavePixController,
    ContaController,
    TransacaoController
};

$url = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);

switch($url)
{
  case '/correntista/save':
    CorrentistaController::salvar();
    break;   

    case '/correntista/entrar':
        CorrentistaController::entrar();
        break;

        case '/conta/pix/enviar':
            ContaController::enviar();
            break;

            case '/conta/pix/receber':
                ContaController::receber();
                break;

                case '/conta/extrato':
                    ContaController::extrato();
                    break;
                
}

