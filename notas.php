<?php
   $nome = "";
   $idade = 0;
   $resultado = "";

   if($_SERVER["REQUEST_METHOD"] == "POST"){//Trocado do POST para GET
        $nome = $_POST["nome"];
        $idade = $_POST["idade"];

        //Area das notas (é aqui que vai ser recebido)
        $nota1 = $_POST["nota1"];
        $nota2 = $_POST["nota2"];
        $nota3 = $_POST["nota3"];
        $nota4 = $_POST["nota4"];
        $nota5 = $_POST["nota5"];

        //Calculo da media com pesos (pelo que eu entendi)
        $media = (($nota1 * 2) + ($nota2 * 3) + ($nota3 * 1) + ($nota4 * 1) + ($nota5 * 3)) / 10;
        
        if ($media >= 7){
            $resultado = "APROVADO";
        }
        else if ($media >= 5){ // (Se não for maior que 7, mas for maior ou igual a 5)
            $resultado = "RECUPERAÇÃO";
        }
        else {
            $resultado = "REPROVADO";
        }
    }   
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Atividade Notas(2)</title>
    <link rel="stylesheet" href="style/notas.css">
</head>
<body>
<div class="container">
        <div class="Forms">
            <form action="" method="POST"><!--trocado do POST para GET-->
                <label for= "nome">Nome do aluno:</label>
                <input type="text" id="nome" name="nome" required>

                <label for="nome"> Idade:</label>
                <input type="number" id="idade" min="0" max="150" name="idade" required>

                <label for="nota1">Nota 1:</label>
                <input type="number" id="nota1" min="0" max="10" name="nota1" required>
                 
                <label for="nota2">Nota 2:</label>
                <input type="number" id="nota2" min="0" max="10" name="nota2" required>

                <label for="nota3">Nota 3:</label>
                <input type="number" id="nota3" min="0" max="10" name="nota3" required>
                
                <label for="nota4">Nota 4:</label>
                <input type="number" id="nota4" min="0" max="10" name="nota4" required>

                <label for="nota5">Nota 5:</label>
                 <input type="number" id="nota5" min="0" max="10" name="nota5" required>

                <button type="submit">Enviar</button>
            </form>
            <form action="index.php" method="GET">
            <button type="submit">Volte para o Menu Delta</button>
         </form>
        </div>
        <?php if ($resultado != ""){?>
            <div class="resultado">
                <h1>Nome: <?= $nome ?></h1>
                <h1>Idade: <?= $idade ?></h1>
                <h1>Média: <?= $media ?></h1>
                <p>Atualmente: <?= $resultado ?></p>
            </div>


      <?php  } ?>
</div>
</body>
</html>