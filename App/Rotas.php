<?php

use APP\Controller\{
    CorrentistaController,
    ChavePixController,
    ContaController,
    TransacaoController
};
use APP\DAO\TransacaoDAO;

$url = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);

switch($url)
{
  case '/exportar':
    $return_var = NULL;
        $output = NULL;
        $command = 'C:/"Program Files"/MySQL/"MySQL Server 8.0"/bin/mysqldump -uroot -petecjau -P3307 -hlocalhost db_bancodigital > C:/Dev/file.sql';
        exec($command, $output, $exit_code);

        var_dump($exit_code);
        echo "deu certo.";
    break;
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
    case '/transacao/pix/enviar':
      TransacaoController::enviar();
    break;

    /**
  * [OK] Exemplo de Acesso:http://0.0.0.0:8000/conta/pix/receber
 */

    case '/transacao/pix/receber':
      TransacaoController::receber();
     break;
                
    /**
  * [OK] Exemplo de Acesso:http://0.0.0.0:8000/conta/extrato
 */


   case '/conta/extrato':
     ContaController::extrato();
    break;

    
  case '/pix/chave/remover':
    ChavePixController::remover();
    break;
  
  case '/pix/chave/salvar':
    ChavePixController::salvar();
    break;

  case '/chave/pix/listar':
    ChavePixController::listar();
    break;
  
  case'/conta/fechar':
    ContaController::fechar();
    break;
  
  case '/conta/abrir':
    ContaController::abrir();
    break;

}


