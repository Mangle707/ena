<?php

echo "<br>Meu sistema esta conectado!";

//crie a tabela caso nao exista
$sql = "CREATE TABLE IF NOT EXISTS jogos (
 id INT AUTO_INCREMENT PRIMARY KEY,
 nome VARCHAR(100) NOT NULL,
 genero VARCHAR(50) NOT NULL,
 nota INT NOT NULL,
 ano_lancamento INT NOT NULL
 )"; 

$pdo->exec($sql);

echo "<br>Tabela criada com sucesso!";

 
if($_SERVER["REQUEST_METHOD"] == "POST"){

    $nome = $_POST["nome"];
    $genero = $_POST["genero"];
    $nota = $_POST["nota"];
    $ano_lancamento = $_POST["ano_lancamento"];
    $senha = $_POST["senha"];

    if($senha == $senha_correta){

        $enviar = "INSERT INTO jogos(
            nome, genero, nota, ano_lancamento
            )VALUES('$nome','$genero',$nota,$ano_lancamento)";

        //aqui envia os dados
        $pdo->exec($enviar);

        echo "<br><p>Valor enviado</p>";

    }else{

        echo "<br><p>Senha incorreta!</p>";

    }
     
}

?>

<h1 class="Titulo">Atividade 4 (Cadastro de jogos pelo banco)</h1>

<div class="Forms">

    <form action="" method="POST">

        <label for="nome">Nome:</label>
        <input type="text" id="nome" name="nome" placeholder="Digite o nome do jogo" required>


        <label for="genero">Genero:</label>
        <input type="text" id="genero" name="genero" placeholder="Digite o genero do jogo" required>


        <label for="nota">Nota:</label>
        <input type="number" id="nota" name="nota" placeholder="Digite a sua nota para o jogo" required>


        <label for="ano_lancamento">Ano de lançamento:</label>
        <input type="number" id="ano_lancamento" name="ano_lancamento" placeholder="Digite o ano de lançamento" required>


        <label for="senha">Senha:</label>
        <input type="password" id="senha" name="senha" placeholder="Digite a senha" required>


        <button type="submit">Enviar</button>

    </form>

</div>


<h2>Jogos cadastrados</h2>

<?php

// Mostra os jogos cadastrados
$sql = "SELECT * FROM jogos";
$resultado = $pdo->query($sql);

echo "<table border='1'>";

echo "<tr>";
echo "<th>ID</th>";
echo "<th>Nome</th>";
echo "<th>Genero</th>";
echo "<th>Nota</th>";
echo "<th>Ano de lançamento</th>";
echo "</tr>";

while($jogo = $resultado->fetch(PDO::FETCH_ASSOC)){

    echo "<tr>";
    echo "<td>" . $jogo["id"] . "</td>";
    echo "<td>" . $jogo["nome"] . "</td>";
    echo "<td>" . $jogo["genero"] . "</td>";
    echo "<td>" . $jogo["nota"] . "</td>";
    echo "<td>" . $jogo["ano_lancamento"] . "</td>";
    echo "</tr>";

}

echo "</table>";

?>


<br>

<form action="index.php" method="GET">
    <button type="submit">Volte para o Menu Delta</button>
</form>
