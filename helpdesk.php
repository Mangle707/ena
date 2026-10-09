<?php 
require_once "helpdesk-func.php";

$mensagem = "";

//para processar os formularios do post
if ($_SERVER['REQUEST_METHOD']=== 'POST'){
    $acao = $_POST['acao'];
      
    //acao de cadastro
    if ($acao === 'cadastrar') {
        $solicitante = $_POST['solicitante'];
        $setor = $_POST['setor'];
        $equipamento = $_POST['equipamento'];
        $descricao = $_POST['descricao'];
        $prioridade = $_POST['prioridade'];

        if (cadastrarChamado($solicitante, $setor, $equipamento, $descricao, $prioridade)) {
            $mensagem = "<p class='sucesso'>Chamado registrado com sucesso!</p>";
        } else {
            $mensagem = "<p class='erro'>Falha ao registrar chamado. Verifique os campos obrigatórios.</p>";
        }
    } 
        //atualiza
    else if ($acao === 'atualizar') {
        $id = isset($_POST['id']) ? (int)$_POST['id'] : -1;
        $novoStatus = $_POST['status'] ?? '';

        if (atualizarStatusChamado($id, $novoStatus)) {
            $mensagem = "<p class='sucesso'>Status do chamado #$id atualizado!</p>";
        } else {
            $mensagem = "<p class='erro'>Erro ao atualizar o chamado.</p>";
        }
    } 
    //exclui 
    else if ($acao === 'excluir') {
        $id = isset($_POST['id']) ? (int)$_POST['id'] : -1;

        if (excluirChamado($id)) {
            $mensagem = "<p class='sucesso'>Chamado #$id removido com sucesso!</p>";
        } else {
            $mensagem = "<p class='erro'>Erro ao excluir o chamado ou registro inexistente.</p>";
        }
    }
}

// Busca as informações atualizadas do JSON para a exibição na página
$chamadosAtuais = listarChamados();
$estatisticas = gerarRelatorio();
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>HelpDesk</title>
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
</body>
</html>