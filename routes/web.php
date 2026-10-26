<?php

require_once __DIR__ . '/../app/Http/Controllers/PortfolioController.php';
require_once __DIR__ . '/../app/Http/Controllers/IdadeController.php';
require_once __DIR__ . '/../app/Http/Controllers/NotasController.php';

require_once __DIR__ . '/../app/Http/Controllers/LoginController.php';

require_once __DIR__ . '/../app/Http/Controllers/JogosController.php';
//require_once __DIR__ . '/../app/Http/Controllers/HelpdeskController.php';

//Listando em arrays as rotas que vamos criar.
return [
      //o site nao e achado atraves do link pelo portfolio
    'GET' => [
          'portfolio' => [new PortfolioController(), 'index'],
          
          'jogos' => [new JogosController(), 'index'],
          'idade' => [new IdadeController(), 'index'],
          'notas' => [new NotasController(), 'index'],
          //'NotasDesafio' => []
          //'funcoes' => [],
          //'json' => [],
          'login-basico' => [new LoginController(), 'index'],
          //'notas' => [],
          //'NotasDesafio' => []
          //'helpdesk' => [new HelpdeskController(), 'helpdesk'],

     ],   
        //'POST' => [
              //'helpdesk' => [new HelpdeskController(), '']    
            //  ]
];



?>