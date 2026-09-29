<?php
//dados da conexão do mySql
$host = "localhost";
$banco = "sabrina315";//nome do banco
$usuario = "sabrina315";
$senha = "315!@#";

try {//é como o um if e else no try se conseguir vai ali se nao vai para o catch
    // pdo = apenas uma sigla usada para a variavel
    //PDO = PHP Data Objects - é uma ferramenta do PHP para conversar com o banco de dados.(crie um novo objeto)
                                    //dbname(nome do banco de dados)
   $pdo = new PDO("mysql:host=$host;dbname=$banco;
   charset=utf8mb4", $usuario, $senha);
   //-> serve para puxar algo que pertende aquele objeto
   //setAttribute significa qque esta sendo acessado algo que esta dentro daquele objeto
   $pdo->setAttribute(
      PDO::ATTR_ERRMODE,   //PDO::ATTR_ERRMODE -é para configurar o modo de erros PDO
      PDO::ERRMODE_EXCEPTION   //PDO::ERRMODE_EXCEPTION - é para quando acontecer algum erro
   );
   echo "Conectado com seucesso!";
} catch(PDOException $erro) { //manda a mensagem de erro caso o try nao de certo

    echo "Erro ao conectar:".$erro ->getMessage();
}
?>