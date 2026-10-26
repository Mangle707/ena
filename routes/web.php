<?php

require_once __DIR__ . '/../app/Http/Controllers/PortfolioController.php';
//require_once __DIR__ . '/../app/Http/Controllers/HelpdeskController.php';
require_once __DIR__ . '/../app/Http/Controllers/JogosController.php';
//Listando em arrays as rotas que vamos criar.
return [
      //o site nao e achado atraves do link pelo portfolio
    'GET' => [
          'portfolio' => [new PortfolioController(), 'index'],
          //'helpdesk' => [new HelpdeskController(), 'helpdesk'],
          'jogos' => [new JogosController(), 'index'],
          'idade' => [new IdadeController(), 'index'],
          //'funcoes' => [],
          //'json' => [],
          //'login-basico' => [],
          //'notas' => [],
          //'NotasDesafio' => []

     ],   
        //'POST' => [
              //'helpdesk' => [new HelpdeskController(), '']    
            //  ]
];



?>