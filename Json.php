<?php
//1. DECLARA O CAMINHO DO ARQUIVO JSON
$caminho = __DIR__ . "/dados.json";

// 2. ABRIR/LER ARQUIVOS
$json = file_get_contents($caminho);

// 3.TRANSFORMAR JSON EM ARRAY PHP
$alunos = json_decode($json, true);

// 4. CRIAR UM ALUNO EM JSON
$novoAluno = [
    "nome" => "Sabrina",
    "idade" => 19,
    "curso" => "Desenvolvimento de sistemas"
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
echo "DADOS ENVIADOS PARA JSON"
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>

    
</body>
</html>