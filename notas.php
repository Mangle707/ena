<?php
   $nome = "";
   $idade = 0;
   $resultado = "";
   $restante = 0;
   $frequencia = 0;

   if($_SERVER["REQUEST_METHOD"] == "POST"){//Trocado do POST para GET
        $nome = $_POST["nome"];
        $idade = $_POST["idade"];
        $frequencia = $_POST["frequencia"];

        //Area das notas (é aqui que vai ser recebido)
        $nota1 = $_POST["nota1"];
        $nota2 = $_POST["nota2"];
        $nota3 = $_POST["nota3"];
        $nota4 = $_POST["nota4"];
        $nota5 = $_POST["nota5"];

        //Calculo da media com pesos (pelo que eu entendi)
        $media = (($nota1 * 2) + ($nota2 * 3) + ($nota3 * 1) + ($nota4 * 1) + ($nota5 * 3)) / 10;
        if ($frequencia < 75) {
            $resultado = "REPROVADO POR FREQUÊNCIA";
            $restante = 7 - $media; 
            if ($restante < 0) { $restante = 0; } 
        }
        else if ($media == 10 && $frequencia >= 75){
            $resultado = "APROVADO COM EXELENCIA";
        }
        else if ($media >= 7 && $frequencia >= 75){ 
            $resultado = "APROVADO";
        }
        else if ($media >= 5 && $media < 7){
            $resultado = "RECUPERAÇAO";
            $restante = 7 - $media;
        }
        else{
            $resultado = "REPROVADO";
            $restante = 7 - $media;
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

    <style>
        .classe-aprovado {
            color: #00ff00; /* Verde */
            font-weight: bold;
        }
        .classe-reprovado {
            color: #ff0000; /* Vermelho */
            font-weight: bold;
        }
        .classe-recuperacao {/*Laranja */
            color: orange;
            font-weight: bold;
        }
    </style>
</head>
<body>
<div class="container">
        <div class="Forms">
            <form action="" method="POST"><!--trocado do POST para GET-->
                <label for= "nome">Nome do aluno:</label>
                <input type="text" id="nome" name="nome" required>

                <label for="nome"> Idade:</label>
                <input type="number" id="idade" min="1" max="120" name="idade" required>

                <label for="frequencia"> Frequencia:</label>
                <input type="number" id="frequencia" placeholder="Frequencia de 0% a 100%" min="0" max="100" name="frequencia" required>

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
            <?php if ($resultado == "APROVADO COM EXELENCIA" || $resultado == "APROVADO") { ?>   
                <h1>Nome: <?= $nome ?></h1>
                <h1>Idade: <?= $idade ?></h1>
                <h1>Frequencia: <?= $frequencia?></h1>
                <h1>Média: <?= $media ?></h1>
                <p>Atualmente: <span class="classe-aprovado"><?= $resultado ?></span></p>
                <?php } ?>
                    <?php if($resultado == "RECUPERAÇAO"){ ?>
                       <h1>Nome: <?= $nome ?></h1>
                       <h1>Idade: <?= $idade ?></h1>
                       <h1>Frequencia: <?= $frequencia?></h1>
                       <h1>Média: <?= $media ?></h1>
                       <p>Atualmente:<span class="classe-recuperacao"><?= $resultado ?></span></p>
                       <p>Restante para a media: <?= $restante ?></p>
                    <?php } ?>
                    <?php if($resultado == "REPROVADO" || $resultado == "REPROVADO POR FREQUÊNCIA"){ ?>
                       <h1>Nome: <?= $nome ?></h1>
                       <h1>Idade: <?= $idade ?></h1>
                       <h1>Frequencia: <?= $frequencia?></h1>
                       <h1>Média: <?= $media ?></h1>
                       <p>Atualmente:<span class="classe-reprovado"><?= $resultado ?></span></p>
                       <p>Restante para a media: <?= $restante ?></p>
                    <?php } ?>
                </div>
     
        <?php }?>
     
</div>
</body>
</html>