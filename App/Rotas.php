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
    /**
  * [OK] Exemplo de Acesso:http://localhost:
 */
  case '/correntista/save':
    CorrentistaController::salvar();
    break;   

    
    /**
  * [OK] Exemplo de Acesso:http://localhost:
 */
    case '/correntista/entrar':
        CorrentistaController::entrar();
        break;

        
    /**
  * [OK] Exemplo de Acesso:http://localhost:
 */
        case '/conta/pix/enviar':
            ContaController::enviar();
            break;

    /**
  * [OK] Exemplo de Acesso:http://localhost:
 */

            case '/conta/pix/receber':
                ContaController::receber();
                break;
                
    /**
  * [OK] Exemplo de Acesso:http://localhost:
 */


                case '/conta/extrato':
                    ContaController::extrato();
                    break;
                
}


