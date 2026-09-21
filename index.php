<?php
      $nome = "";
      $idade = 0;
      $resultado = "";
       
      if($_SERVER["REQUEST_METHOD"] == "POST"){//o if esta perguntando se possui o metodo post no codigo
        $nome = $_POST["nome"]; //reconhece o id dos forms para essa nova variavel
        $idade = $_POST["idade"];
        //calculo de idade
            if ($idade >= 18){
                 $resultado = "Sim voce é"; //nova variavel para calcular sua idade
               }
            else {
                $resultado = "Nao é";
               }
    }
        ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Delta</title>
     <link rel="stylesheet" href="style.css">
</head>
<body>  
        
    <div class=container>
           <div class=Forms>
           <form action="" method="POST">
            <label for= "nome">Nome:</label>
          <input type="text" id="nome" name="nome" required>
            <label for="idade">Idade:</label>
          <input type="number" id="idade" name="idade" required>
         <button type="submit">Enviar</button>
        </form>
        </div>
        <?php if ($resultado != "") { ?>
         
         <h1>Nome: <?= $nome ?></h1>
         <h1>Idade: <?= $idade ?></h1>
        <hr>
        <p>E maior de idade? <?= $resultado ?></p>
    </div>
         <?php } ?>
</body>
</html>