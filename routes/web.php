<?php

require_once __DIR__ . '/../app/Http/Controllers/PortfolioController.php';

require_once __DIR__ . '/../app/Http/Controllers/IdadeController.php';
require_once __DIR__ . '/../app/Http/Controllers/NotasController.php';
require_once __DIR__ . '/../app/Http/Controllers/NotasDController.php';
require_once __DIR__ . '/../app/Http/Controllers/LoginController.php';
require_once __DIR__ . '/../app/Http/Controllers/JogosController.php';
require_once __DIR__ . '/../app/Http/Controllers/JsonController.php';
require_once __DIR__ . '/../app/Http/Controllers/HelpdeskController.php';
//require_once __DIR__ . '/../app/Http/Controllers/PooController.php';
//require_once __DIR__ . '/../app/Http/Controllers/Poo2Controller.php';

//Listando em arrays as rotas que vamos criar.
return [
   
    'GET' => [
          'portfolio' => [new PortfolioController(), 'index'],
          //atividades
          'idade' => [new IdadeController(), 'index'],
          'notas' => [new NotasController(), 'index'],
          'NotasDesafio' => [new NotasDController(), 'index'],
          'jogos' => [new JogosController(), 'index'],
          'login-basico' => [new LoginController(), 'index'],
          'Json' => [new JsonController(), 'index'],

          //'poo' => [new PooController(), 'index'],
          //'poo2' => [new Poo2Controller(), 'index'],
          
          'helpdesk' => [new HelpdeskController(), 'index'],

     ],   
        'POST' => [
              'helpdesk' => [new HelpdeskController(), 'salvar'],    

             // 'login-basico' => [new LoginController(), 'index'],//teste 'SUCESSO'
             // 'idade' => [new IdadeController(), 'index'],
             // 'notas' => [new NotasController(), 'index'],
              //'NotasDesafio' => [new NotasDController(), 'index'],
              //'jogos' => [new JogosController(), 'index'],
              //'Json' => [new JsonController(), 'index'],
              //'poo2' => [new Poo2Controller(), 'index'],
              ]
];



?>