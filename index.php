<?php 
   //carregando arquivo de rotas e guadando o valor retornado por ele na variavel
   //$rotas
   $rotas = require __DIR__ . "/routes/web.php";
   
   // Se ro estiver vazia  vai direcionar automaticamente para o portfolio
   $rota = $_GET['rota'] ?? 'portfolio';
   
   //Definindo a variavel de verificaçao de metodo HTTP requisitado
   $metodo = $_SERVER['REQUEST_METHOD'];

   //Verificando se a rota existe e se nao existir defina status 404
   if(!isset($rotas[$metodo][$rota])) {
     htt_response_code(404);
     echo "Pagina nao encontrada";
     exit;
   }

   //
   [$controller,$acao] = $rotas
   [$metodo][$rota];

   //
   $controller -> $acao;





?>
