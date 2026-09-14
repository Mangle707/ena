<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
      $nome = "Sabrina";
      $idade = 19;
         
      if ($idade >= 18){
        $maiorid = "Sim voce é";
      }
      else {
        $maiorid = "Nao é";
      }
        ?>
        <h1>Nome: <?= $nome ?></h1>
        <p>Idade: <?= $idade ?></p>
        <p>E maior de idade? <?= $maiorid ?></p>
</body>
</html>