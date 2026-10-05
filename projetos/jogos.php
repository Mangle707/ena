<?php
  require __DIR__ . "/../conexao.php";
  
  require "conexao.php";
  $nome = "";
  $genero = "";
  $nota = 0;
  $resul = "";

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
        echo "<br><p>Valor enviado</p>";
         
    }

    $consulta = $pdo->query("SELECT * FROM jogos");
    $jogos = $consulta->fetchAll(PDO::FETCH_ASSOC); 
?>
<!DOCTYPE html>
<html lang="PT-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro de Jogos</title>
    <link rel="stylesheet" href="../style/jogos.css">
</head>
<body>
<div class="container"> 
     <h1 class = "Titulo">Atividade 4 (Cadastro de jogos pelo banco) </h1>
        <div class="Forms">
           <form action="" method="POST">
                <label for= "nome">Nome:</label>
                <input type="text" id="nome" name="nome"  placeholder="Digite o nome do jogo" required>

                <label for="senha">Genero:</label>
                <input type="text" id="genero" name="genero" placeholder="Digite o genero do jogo"required>

                <label for="senha">Nota:</label>
                <input type="number" id="nota" name="nota" placeholder="Digite a sua nota para o jogo"required>
                <button type="submit">Enviar</button>
            </form>
    </div>
    <form action="index.php" method="GET">
            <button type="submit">Volte para o Menu Delta</button>
         </form>
</div>

<h2>Jogos ja cadastrados</h2>

<div class=table-container>
    <table>
        <tr>
            <th>ID</th>
            <th>Nome</th>
            <th>Genero</th>
            <th>Nota</th>
        </tr>
    <?php if (count($jogos) > 0): ?>
        <?php foreach($jogos as $jogo) {?>
            <tr>
                <td><?= $jogo["id"]?></td>
                <td><?= $jogo["nome"]?></td>
                <td><?= $jogo["genero"]?></td>
                <td><?= $jogo["nota"]?></td>
            </tr>
            <?php } ?>
            <?php else: ?>
            <tr>
                <td colspan="4" style="text-align: center; color: #888;">Nenhum jogo cadastrado ainda.</td>
            </tr>
        <?php endif; ?>
    </table>
</div>
</body>
</html>