<?php

//1. DECLARA O CAMINHO DO ARQUIVO JSON
$caminho = __DIR__ . "/dados.json";

// 2. ABRIR/LER ARQUIVOS
$json = file_get_contents($caminho);

// 3.TRANSFORMAR JSON EM ARRAY PHP
$alunos = json_decode($json, true);

if($_SERVER["REQUEST_METHOD"] == "POST"){

$acao = $_POST["acao"];

 if ($acao === "cadastrar"){

 
// 4. CRIAR UM ALUNO EM JSON
$novoAluno = [
    "nome" => $_POST["nome"],
    "idade" => $_POST["idade"],
    "curso" => $_POST["curso"]
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

  if ($acao === "atualizar"){

        //pega os dados do formulario
         $nome = $_POST["nome"];
         $novaIdade = $_POST["idade"];
         $novoCurso = $_POST["curso"];
         
         //percorre todos os alunos
         foreach($alunos as $posicao => $aluno){

         if($aluno ["nome"] == $nome){
             $alunos[$posicao]["idade"] = $novaIdade;
             $alunos[$posicao]["curso"] = $novoCurso;
            }
         }
       $jsonAtualizado = json_encode(
        $alunos, 
        JSON_PRETTY_PRINT  | JSON_UNESCAPED_UNICODE );
          //7. SALVA NO ARQUIVO
          file_put_contents($caminho, $jsonAtualizado);
         echo "Dados atualizados";

  }

  if ($acao === "deletar"){
        foreach($alunos as $posicao => $aluno){
           
        }
  }
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
    <button type="submit" name="acao" value="cadastrar">Cadastrar</button>
 </form>

 

    <h2>Alunos Cadastrados</h2>
    <?php foreach($alunos as $aluno) { ?>
     <h3><?= $aluno["nome"] ?></h3>
      <p>Idade: <?= $aluno["idade"] ?></p>
      <p>Curso: <?= $aluno["curso"] ?></p>
    <?php } ?>
    <h2>Atualizar Cadastrados</h2>
<form method="POST">
    <label>nome: </label>
    <input  type="text" name="nome" id="nome">
     <label>idade: </label>
    <input  type="number" name="idade" id="idade">
     <label>curso: </label>
    <input  type="text" name="curso" id="curso">
    <button type="submit" name="acao" value="atualizar">Atualizar</button>
 </form>

       <h2>Deletar Cadastrados</h2>
<form method="POST">
    <label>nome: </label>
    <input  type="text" name="nome" id="nome">
     <label>idade: </label>
    <input  type="number" name="idade" id="idade">
     <label>curso: </label>
    <input  type="text" name="curso" id="curso">
    <button type="submit" name="acao" value="deletar">Deletar</button>
 </form>


</body>
</html>