<?php 
$nome = "sabrina";
$senha = "12345";
$resultado = "";

if($_SERVER["REQUEST_METHOD"] == "POST"){//Trocado do POST para GET
    $nome = $_POST["nome"];
    $senha = $_POST["senha"];


    if ($nome == "sabrina" && $senha == "12345") {
       
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
    <link rel="stylesheet" href="../style/loginbasico.css">
    <title>Login-basico</title>
</head>
<body>
       <div class="container"> 
       <h1 class = "Titulo">Atividade 3 (Login Basico) </h1>
       <h3>nome: sabrina  senha: 12345</h3>
         <div class="Forms">
            <form action="" method="POST"><!--trocado do POST para GET-->
                <label for= "nome">Nome:</label>
                <input type="text" id="nome" placeholder="Digite o nome" name="nome" required>

                <label for="senha"> Senha:</label>
                <input type="password" id="senha" name="senha" placeholder="Digite sua senha"required>
                <button type="submit">Enviar</button>
              </form>
            </div>
            <h1><?= $resultado ?></h1>
            <form action="../index.php" method="GET">
            <button type="submit">Volte para o Menu Delta</button>
         </form>
        </div>
         <!--O metodo post nao deixa aparecer as informacoes da senha na URL ja o get sim-->
</body>
</html>