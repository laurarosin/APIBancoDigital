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
  * [OK] Exemplo de Acesso:http://0.0.0.0:8000/correntista/save
 */
  case '/correntista/salvar':
    CorrentistaController::salvar();
  break;   

    
    /**
  * [OK] Exemplo de Acesso:http://0.0.0.0:8000/correntista/entrar
 */
    case '/correntista/entrar':
      CorrentistaController::entrar();
     break;

        
    /**
  * [OK] Exemplo de Acesso:http://0.0.0.0:8000/conta/pix/enviar
 */
    case '/conta/pix/enviar':
      ContaController::enviar();
    break;

    /**
  * [OK] Exemplo de Acesso:http://0.0.0.0:8000/conta/pix/receber
 */

    case '/conta/pix/receber':
      ContaController::receber();
     break;
                
    /**
  * [OK] Exemplo de Acesso:http://0.0.0.0:8000/conta/extrato
 */


   case '/conta/extrato':
     ContaController::extrato();
    break;
              
}


