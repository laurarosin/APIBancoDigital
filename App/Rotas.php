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


