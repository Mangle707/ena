<?php

require_once __DIR__ . "/../../Models/Chamado.php";
class HelpdeskController{
    // GET - Exibir a página do Helpdesk
    public function index(){

        $model = new Chamado();
 
        $chamados = $model->lerChamadas();
        $relatorio = $model->gerarRelatorio();
        $mensagem = "";

         //caminho para o portfolio.php dentro do Views que ta no resources
         require __DIR__ . "/../../../resources/views/helpdesk.php";
    }


    // POST - Receber os formulários do Helpdesk
    public function salvar()
    {
        $model = new Chamado();
 
        $acao = $_POST["acao"] ?? "";
        $sucesso = false;
 
        if ($acao === "cadastrar") {
            $sucesso = $model->cadastrarChamado(//de cadastrarChamados apenas tirei o S
                $_POST["nome"] ?? "",
                $_POST["setor"] ?? "",
                $_POST["equipamento"] ?? "",
                $_POST["descricao"] ?? "",
                $_POST["prioridade"] ?? ""
            );
        }
 
        elseif ($acao === "atualizar") {
            $sucesso = $model->atualizarChamado(
                (int) ($_POST["posicao"] ?? -1),
                $_POST["status"] ?? ""
            );
        }
 
        elseif ($acao === "excluir") {
            $sucesso = $model->excluirChamado(
                (int) ($_POST["posicao"] ?? -1)
            );
        }
 
        // Mensagem de retorno para o usuário
        $mensagem = $sucesso
            ? "Operação realizada com sucesso!"
            : "Não foi possível realizar a operação.";
 
        // Atualizar os dados após a operação
        $chamados = $model->lerChamadas();//de LerChamados vira LerChamadas
        $relatorio = $model->gerarRelatorio();
 
        require __DIR__ . "/../../../resources/views/projetos/helpdesk.php";
    }
}

 
?>