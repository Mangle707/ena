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
      echo "<h1>Ola, $nome </h1>";
      echo "<p>Este é um exemplo simples de uma página construída apenas com HTML puro.</p>";
        ?>
        <h1>Nome: <?= $nome ?></h1>
        <p>Idade: <?= $idade ?></p>
</body>
</html>