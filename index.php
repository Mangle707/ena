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
     <header>
          <nav class="navbar">
               <h2 class="logo">Meu portifolio</h2>

     <ul class="menu">
      <li><a href="#inicio">Inicio</a></li>
      <li><a href="#sobre">Sobre</a></li>
      <li><a href="#habilidades">Habilidades</a></li>
      <li><a href="#projeto">Projetos</a></li>
      <li><a href="#contato">Contato</a></li>
     </ul>
     </nav>
</header>
<main>
            <!--INICIO-->
<section id="inicio" class="inicio">
     <div class="inicio-conteudo">
          <p class="saudaçao">Olá! Eu sou</p>

          <h1>Sabrina G. de Oliveira</h1>
          <h2>desenvolvedora em formaçao</h2>

          <p>
               Estudante de desenvolvimento de sistemas,
               me preparando para entrar no mercado de trabalho,
               ja com um diploma do curso de ingles KNN e Tecnico de desenvolvimento de
               Sistemas em andamento.
          </p>
          <a href="#projetos" class="botao">
               Veja meus Projetos
          </a>
     </div>
</section>

          <!--SOBRE MIM-->
<section id="sobre" class="secao">

</section>
</main>


</body>
</html>