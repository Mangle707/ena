<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
     <link rel="stylesheet" href="style.css">
</head>
<body>
    <?php
      $nome = "Sabrina";
      $idade = 19;
           
      if ($idade >= 18){
        $maiorid = "Sim voce é"; //nova variavel para calcular sua idade
      }
      else {
        $maiorid = "Nao é";
      }
        ?>
        <div classname=container>
        <h1>Nome: <?= $nome ?></h1>
        <h1>Idade: <?= $idade ?></h1>
        <p>E maior de idade? <?= $maiorid ?></p>
        </div>
</body>
</html>