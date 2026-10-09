<?php

const CAMINHO_JSON = 'chamados.json';
const SECTORS = ['Produçao', 'Administrativo', 'Logistica', 'Financeiro', 'TI'];
const EQUIPMENTS = ['Computador', 'Impressora', 'Rede', 'Sistema', 'Outro'];
const PRIORITIES = ['Baixa', 'Média', 'Alta'];
const STATUSES = ['Aberto', 'Em andamento', 'Resolvido'];


function listarChamados(): array {// isso le o arquivo JSON e retorna um array nativo do PHP
    if (!file_exists(CAMINHO_JSON)) {
        return [];
    }
    $conteudo = file_get_contents(CAMINHO_JSON);
    $dados = json_decode($conteudo, true);
    return is_array($dados) ? $dados : [];
}

// Aqui vai salvar o array de chamados de volta no arquivo JSON
function salvarChamados(array $chamados): bool {
    $conteudo = json_encode($chamados, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE);
    return file_put_contents(CAMINHO_JSON, $conteudo) !== false;
}

//realiza as validações obrigatórias

function cadastrarChamado(string $solicitante, string $setor, string $equipamento, string $descricao, string $prioridade): bool {
    $solicitante = trim($solicitante);
    $descricao = trim($descricao);


  //validaçoes para o codigo
    if (empty($solicitante) || empty($descricao)) {
        return false;
    }
    if (!in_array($setor, SECTORS) || !in_array($equipamento, EQUIPMENTS) || !in_array($prioridade, PRIORITIES)) {
        return false;
    }
    $chamados = listarChamados();

    $novoChamado = [
        'solicitante' => $solicitante,
        'setor' => $setor,
        'equipamento' => $equipamento,
        'descricao' => $descricao,
        'prioridade' => $prioridade,
        'status' => 'Aberto'
    ];

    $chamados[] = $novoChamado;
    return salvarChamados($chamados);
}


    // UPDATE                        //nova variavel
  function atualizarStatusChamado(int $id, string $novoStatus): bool {
    if (!in_array($novoStatus, STATUSES)) {
        return false;
    }

    $chamados = listarChamados();

    
    if (!isset($chamados[$id])) {
        return false;
    }

    $chamados[$id]['status'] = $novoStatus;
    return salvarChamados($chamados);
      }

      // DELETE
     function excluirChamado(int $id): bool {
        $chamados = listarChamados();

    
        if (!isset($chamados[$id])) {
               return false;
           }

           unset($chamados[$id]);
                $chamados = array_values($chamados);

           return salvarChamados($chamados);
}

   //para geraraçao de RELATORIO

   function gerarRelatorio(): array {

    $chamados = listarChamados();

    $relatorio = [
        'total' => count($chamados),
        'abertos' => 0,
        'em_andamento' => 0,
        'resolvidos' => 0
    ];

      foreach ($chamados as $chamado) {
        if ($chamado['status']=== 'Aberto'){
            $relatorio['abertos']++;
        }
        else if ($chamado['status']=== 'Em andamento'){
            $relatorio['em_andamento']++;

        }
        else if ($chamado['status'] === 'Resolvido'){
            $relatorio['resolvido']++;
        }
      }

      return $relatorio;
   }

?>