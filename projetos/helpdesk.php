<?php 
require_once "../helpdesk-func.php";

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
    <div class="container">
        <header>
            <h1>Helpdesk TI - Gerenciamento de Chamadas</h1>
        </header>
        
        <div class="painel-relatorio">
            <div class="card-relatorio">
                <h3>Registrados</h3>
                <p><?= $estatisticas['total']?></p>
            </div>
            <div class="card-relatorio">
            <h3>Abertos</h3>
            <p><?= $estatisticas['abertos'] ?></p>
        </div>
        <div class="card-relatorio">
            <h3>Em andamento</h3>
            <p><?= $estatisticas['em_andamento'] ?></p>
        </div>
        <div class="card-relatorio">
            <h3>Resolvidos</h3>
            <p><?= $estatisticas['resolvidos'] ?></p>
        </div>
    </div>
        
    <?= $mensagem ?>

<!-- Seçao de abertura de chamados (Create)-->
     <div class="secao-cadastro">
     <h2>Registrar Novo Chamado</h2>

        <form action="helpdesk.php" method="POST">
            <input type="hidden" name="acao" value="cadastrar">
            
            <div class="campo-grupo">
                <div class="campo">
                    <label for="solicitante">Nome do Solicitante *</label>
                    <input type="text" id="solicitante" name="solicitante" required placeholder="Ex: João Silva">
                </div>
                
             <div class="campo">  <!--Setor e valores-->
                    <label for="setor">Setor *</label>
                    <select id="setor" name="setor" required>
                        <option value="Produção">Produção</option>
                        <option value="Administrativo">Administrativo</option>
                        <option value="Logística">Logística</option>
                        <option value="Financeiro">Financeiro</option>
                        <option value="TI">TI</option>
                    </select>
              </div>

        </div>
</body>
</html>