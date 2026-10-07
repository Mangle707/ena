<?php
$nome = "";
$idade = 0;
$curso = "";
//1. DECLARA O CAMINHO DO ARQUIVO JSON
$caminho = __DIR__ . "/dados.json";

// 2. ABRIR/LER ARQUIVOS
$json = file_get_contents($caminho);

// 3.TRANSFORMAR JSON EM ARRAY PHP
$alunos = json_decode($json, true);

if($_SERVER["REQUEST_METHOD"] == "POST"){
// 4. CRIAR UM ALUNO EM JSON
$novoAluno = [
    "nome" => $nome = $_POST["nome"],
    "idade" => $idade = $_POST["idade"],
    "curso" => $curso = $_POST["curso"]
];
//5. ADICIONAR ALUNO NO ARRAY
$alunos[] = $novoAluno;

// 6. TRANSFORMAR PH PARA JSON 
$jsonAtualizado = json_encode($alunos,
       JSON_PRETTY_PRINT  |//FORMATA O JSON CORRETAMENTE
       JSON_UNESCAPED_UNICODE //SERVE PARA ENTENDER CARACTERES DENTRO DO ARRAY
);
//7. SALVA NO ARQUIVO
file_put_contents($caminho, $jsonAtualizado);
echo "OS DADOS ENVIADOS PARA JSON NO ARQUIVO dados.json";
}


?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
 <form method="POST">
    <label>nome: </label>
    <input  type="text" name="nome" id="nome">
     <label>idade: </label>
    <input  type="number" name="idade" id="idade">
     <label>curso: </label>
    <input  type="text" name="curso" id="curso">
    <button type="submit">Enviar</button>
 </form>
    
    <h2>Alunos Cadastrados</h2>
    <?php foreach($alunos as $aluno) { ?>
     <h3><?= $aluno["nome"] ?></h3>
      <p>Idade: <?= $aluno["idade"] ?></p>
      <p>Curso: <?= $aluno["curso"] ?></p>
    <?php } ?>



</body>
</html>