<?php
   $nome = "";
   $idade = 0;
   $resultado = "";

   if($_SERVER["REQUEST_METHOD"] == "POST"){
        $nome = $_POST["nome"];
        $idade = $_POST["idade"];

        //Area das notas (é aqui que vai ser recebido)
        $nota1 = $_POST["nota1"];
        $nota2 = $_POST["nota2"];
        $nota3 = $_POST["nota3"];
        $nota4 = $_POST["nota4"];
        $nota5 = $_POST["nota5"];

        //Calculo da media ponderada com os pesos (pelo que eu entendi)
        $media = (($nota1 * 2) + ($nota2 * 3) + ($nota3 * 1) + ($nota4 * 1) + ($nota5 * 3)) / 10;
        
        if ($media >= 7){
            $resultado = "APROVADO";
        }
        else if ($media >= 5){ // Se não for maior que 7, mas for maior ou igual a 5)
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
    <link rel="stylesheet" href="style.css">
</head>
<body>
<div class="container">
        <div class="Forms">
            <form action="" method="POST">
                <label for= "nome">Nome do aluno:</label>
                <input type="text" id="nome" name="nome" required>

                <label for="nome"> Idade:</label>
                <input type="number" id="idade" name="idade" required>

                <label for="nota1">Nota 1 (Peso 2):</label>
                <input type="number" id="nota1" name="nota1" required>


                <button type="submit">Enviar</button>
            </form>
        </div>
        <?php if ($resultado != ""){?>
            <div class="resultado">
                <h1>Nome: <?= $nome ?></h1>
                <h1>Idade: <?= $idade ?></h1>
                
        }
</body>
</html>