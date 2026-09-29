<?php
  require "conexao.php";

  echo "<br>Meu sistema esta conectado!";
           //crie a tabela caso nao exista
    $sql = "CREATE TABLE IF NOT EXISTS teste (
     id INT AUTO_INCREMENT PRIMARY KEY,
     nome VARCHAR(100),
     idade INT
     )"; 

     $pdo-> exec($sql);

     echo "<br>Tabela criada com sucesso!";
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Menu Delta</title>
     <link rel="stylesheet" href="style/index.css">
</head>
<body>  
     <ul>
      <li><a href="idade.php">Atividade 1</a></li>
      <li><a href="notas.php">Atividade 2</a></li>
      <li><a href="NotasDesafio.php">Desafio atividade 2</a></li>
      <li><a href="login-basico.php">Atividade 3 Login Basico</a></li>
      <li><a href="jogos.php">Atividade 4 Cadastro de jogos</a></li>
     </ul>
</body>
</html>