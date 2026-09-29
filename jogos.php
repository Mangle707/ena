<?php
  require "conexao.php";
  $nome = "";
  $genero = "";
  $nota = 0;
  $resul = "";


  echo "<br>Meu sistema esta conectado!";
           //crie a tabela caso nao exista
    $sql = "CREATE TABLE IF NOT EXISTS jogos (
     id INT AUTO_INCREMENT PRIMARY KEY,
     nome VARCHAR(100) NOT NULL,
     genero VARCHAR(50) NOT NULL,
     nota INT NOT NULL
     )"; 

    $pdo-> exec($sql);

     echo "<br>Tabela criada com sucesso!";

     
     if($_SERVER["REQUEST_METHOD"] == "POST"){//Trocado do POST para GET
        $nome = $_POST["nome"];
        $genero = $_POST["genero"];
        $nota = $_POST["nota"];
    
        $enviar = "INSERT INTO jogos(
            nome, genero, nota
            )VALUES('$nome','$genero',$nota)";//aqui salva e manda
        
        $pdo-> exec($enviar);//aqui envia os dados
        echo "Valor enviado";
         
    }
?>
<!DOCTYPE html>
<html lang="PT-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro de Jogos</title>
    <link rel="stylesheet" href="style/jogos.css">
</head>
<body>
<div class="container"> 
     <h1 class = "Titulo">Atividade 4 (Cadastro de jogos pelo banco) </h1>
        <div class="Forms">
           <form action="" method="POST"><!--trocado do POST para GET-->
                <label for= "nome">Nome:</label>
                <input type="text" id="nome" name="nome"  placeholder="Digite o nome do jogo" required>

                <label for="senha">Genero:</label>
                <input type="text" id="genero" name="genero" placeholder="Digite o genero do jogo"required>

                <label for="senha">Nota:</label>
                <input type="number" id="nota" name="nota" placeholder="Digite a sua nota para o jogo"required>
                <button type="submit">Enviar</button>
            </form>
    </div>
</div>
</body>
</html>