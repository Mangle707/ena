<?php 
require_once "helpdesk-func.php";

$mensagem = "";

//para processar os formularios do post
if ($_SERVER['REQUEST_METHOD']=== 'POST'){
    //O operador ?? é chamado de operador de coalescencia nula
    //ele significa:
    //"utilize o valor de esquerda,
    // se ele existir e nao for nulo. Caso contrario, utilize o valor a direita"
    $acao = $_POST['acao'] ?? "";
    //if (isset($_POST["acao"])){
    //    $acao = $_POST["acao"];
    //} else {
    //     $acao = "";
    // }
      
    //acao de cadastro
    if ($acao === 'cadastrar') {
        $sucesso = cadastrarChamado(
        $_POST['solicitante'] ?? "",
        $_POST['setor'] ?? "",
        $_POST['equipamento']?? "",
        $_POST['descricao'] ?? "",
        $_POST['prioridade'] ?? "",
        );

        $mensagem = $sucesso ? "Chamado cadastrado com sucesso!" : "Erro ao cadastrar. Verifique os dados";

    } 
        //atualiza
    if ($acao === 'atualizar') {
       $sucesso = atualizarChamado(
        (int) ($_POST["posicao"] ?? -1),
        $_POST["status"] ?? ""
       );

       $mensagem = $sucesso ? "Status atualizado!" : "Nao foi possivel atualizar.";
    } 
    //exclui 
    if ($acao === 'excluir') {
         $sucesso = excluirChamado(
            (int) ($_POST["posicao"] ?? -1));

            $mensagem = $sucesso ? "Chamado excluido!" : "Nao foi possivel excluir.";
    }
}

// Busca as informações atualizadas do JSON para a exibição na página
$chamados = lerChamadas();
$relatorio = gerarRelatorio();

//Evita exibir HTML enviado pelo usuario
function escapar($valor){
    return htmlspecialchars((string) $valor, ENT_QUOTES, "UTF-8");
}
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>HelpDesk</title>
    <link rel="stylesheet" href="../style/helpdesk.css">
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
          <div class="campo-grupo">
                <div class="campo">
                    <label for="equipamento">Equipamento Afetado *</label>
                    <select id="equipamento" name="equipamento" required>
                        <option value="Computador">Computador</option>
                        <option value="Impressora">Impressora</option>
                        <option value="Rede">Rede</option>
                        <option value="Sistema">Sistema</option>
                        <option value="Outro">Outro</option>
                    </select>
                </div>

                <div class="campo">
                    <label for="prioridade">Prioridade *</label>
                    <select id="prioridade" name="prioridade" required>
                        <option value="Baixa">Baixa</option>
                        <option value="Média">Média</option>
                        <option value="Alta">Alta</option>
                    </select>
                </div>
            </div>

            <div class="campo" style="margin-bottom: 15px;">
                <label for="descricao">Descrição Completa do Problema *</label>
                <textarea id="descricao" name="descricao" required placeholder="Descreva os detalhes do problema apresentado..."></textarea>
            </div>

            
            <button type="submit">Abrir Chamado</button>
        </form>
    </div>

    <!-- Seção de Read/Update/Delete OBS:Consulta de chamadas -->
    <h2>Chamados Técnicos Encontrados</h2>
    <div class="grid-chamados">
        <?php if (empty($chamadosAtuais)): //se vazio?>
            <p>Nenhum chamado registrado no momento.</p>
        <?php else: ?>
            <?php foreach ($chamadosAtuais as $posicao => $chamado): ?>
                <div class="card-chamado" style="border: 1px solid #ccc; padding: 15px; margin-bottom: 15px;">
                    <div>
                        <strong>Chamado #<?= $posicao ?></strong> - Prioridade: <?= $chamado['prioridade']?>
                    </div>

                    <div>
                            Solicitante: <?= $chamado['solicitante'] ?> | 
                            Setor: <?= $chamado['setor'] ?> | 
                            Equipamento: <?= $chamado['equipamento'] ?>
                    </div>
                       <div style="background: #f9f9f9; padding: 10px; margin: 5px 0;">
                           <?= $chamado['descricao'] ?>
                        </div>
                    <div>
                         Situação Atual: <strong><?= $chamado['status'] ?></strong>
                    </div>



                    <!-- (Update) -->
                    <form action="helpdesk.php" method="POST" style="display:inline;">
                        <input type="hidden" name="acao" value="atualizar">
                        <input type="hidden" name="id" value="<?= $posicao ?>">
                        <select name="status">
                            <option value="Aberto" <?= $chamado['status'] === 'Aberto' ? 'selected' : '' ?>>Aberto</option>
                            <option value="Em andamento" <?= $chamado['status'] === 'Em andamento' ? 'selected' : '' ?>>Em andamento</option>
                            <option value="Resolvido" <?= $chamado['status'] === 'Resolvido' ? 'selected' : '' ?>>Resolvido</option>
                        </select>
                        <button type="submit">Atualizar Status</button>
                    </form>



                    <!-- (Delete) -->
                    <form action="helpdesk.php" method="POST" style="display:inline;" onsubmit="return confirm('Deseja excluir este chamado?');">
                        <input type="hidden" name="acao" value="excluir">
                        <input type="hidden" name="id" value="<?= $posicao ?>">
                        <button type="submit" style="color: red;">Excluir</button>
                    </form>
                </div>
            <?php endforeach; ?>
        <?php endif; ?>
    </div>

</div> 
       <form action="../index.php" method="GET">
           <button type="submit">Volte para o Menu Delta</button>
        </form>
  
</body>
</html>