<?php

require_once __DIR__ . '/../app/http/Controllers/PortfolioController.php';
require_once __DIR__ . '/../app/http/Controllers/HelpdeskController.php';
//LIstando em arrays as rotas que vamos criar.
return [
    'GET' => [
          'portfolio' => [new PortfolioController(), 'index'],
          //'helpdesk' => [new HelpdeskController(), 'index'],
          'jogos' => [],
          //outras atividades
          'funcoes' => [],
          'idade' => [],
          'json' => [],
          'login-basico' => [],
          'notas' => [],
          'NotasDesafio' => []

     ],   
        'POST' => [
              //'helpdesk' => [new HelpdeskController(), '']    
              ]
];



?>