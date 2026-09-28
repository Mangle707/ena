<?php 
$nome = "sabrina";
$senha = "12345";
$resultado = "";

if($_SERVER["REQUEST_METHOD"] == "POST"){//Trocado do POST para GET
    $nome = $_POST["nome"];
    $senha = $_POST["senha"];


    if ($nome == "sabrina" || $senha == "12345") {
       
        $resultado = "Login realizado com sucesso";
        
    }
    else{
        $resultado = "Usuario ou senha incorretos";
    }
}
?>
<!DOCTYPE html>
<html lang="PT-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login-basico</title>
</head>
<body>
       <div class="container"> 
         <div class="Forms">
            <form action="" method="POST"><!--trocado do POST para GET-->
                <label for= "nome">Nome:</label>
                <input type="text" id="nome" placeholder="Digite o nome" name="nome" required>

                <label for="senha"> Senha:</label>
                <input type="text" id="senha" placeholder="Digite sua senha"required>
                <button type="submit">Enviar</button>
            </div>
            <h1><?= $resultado ?></h1>
        </div>
</body>
</html>