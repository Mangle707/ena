<?php

 function lerChamadas(){
       $arquivo = __DIR__ . "../chamados.json";

       //verifica se o JSON arquivo existe 
       if(!file_exists($arquivo)){
            file_put_contents($arquivo, "[]");
       }
       // ler o arquivo
       $conteudo = file_get_contents($arquivo);

       //converter o JSON para ARRAY php
       $chamados = json_decode($conteudo, true);
    
       return is_array($chamados) ? $chamados : [];// é como se fosse um if else

    }

//                CORRECAO DO HELP DESK FUNC

//_______________________________________________________________________//

    //Salvar os chamados no json
    function salvarChamadas($chamados){
        $arquivo = __DIR__ . "../chamados.json";
        return file_put_contents(
            $arquivo, 
            json_encode($chamados,  JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE
            )
        ) !== false;


    }
    
//_______________________________________________________________________//
    //CREATE - cadastrar chamadas
    function cadastrarChamado($nome, $setor, $equipamento, $descricao, $prioridade) {

    if(trim($nome) === "" || trim($descricao) === ""){
        return false;
    }
    $chamados = lerChamadas();
    
    $novoChamado = [
        "nome" => trim($nome),//trim vai tirar espaço em branco do começo e final apenas
        "setor" => $setor,
        "equipamento" => $equipamento,
        "descricao" => trim($descricao),
        "prioridade" => $prioridade,
        "status" => "Aberto"
    ];

    $chamados[] = $novoChamado;

    return salvarChamadas($chamados);
    }
 //_______________________________________________________________________//
    //UPDATE - atualiza as chamadas
    function atualizarChamado($posicao, $novoStatus) {
          $chamados = lerChamadas();

          $statusPermitidos = [
            "Aberto",
            "Em anddamento",
            "Resolvido"
          ];
        // isset() verifica se uma variavel ou posicao existe e nao contem null
        // o ! inverte  o resultado
        // portanto:
        // "Se nao existir um chamado naquela posicao  encerre a funcao retornando false."
          if(!isset($chamados[$posicao])) {
            return false;
          }
        //in_array()verifica se um valor existe dentro de um array
        //Nesse caso:
        // - $novoStatus: valor que queremos procurar
        // - $statusPermitidos: lista de valores aceitos
        //true: exige comparaçao estrita.
        // o ! significa que a condiçao sera verdadeira quando o valor nao estiver na lista
          if (!in_array($novoStatus, $statusPermitidos, true)){
            return false; 
          }

          $chamados[$posicao]["status"] = $novoStatus;
          
          return salvarChamadas($chamados);

    }
//_______________________________________________________________________//
    //DELETE - Excluir chamados
    function excluirChamado($posicao) {
        $chamados = lerChamadas();

        if (!isset($chamados[$posicao])) {
            return false;
        }

        //DELETE aquela posicao especifica
        unset($chamados[$posicao]);

        //ATUALIZAR alista de chamados em array
        $chamados = array_values($chamados);

        //SALVAR os chamados novamente pela funcao
        return salvarChamadas($chamados);

    }

    //_______________________________________________________________________//
    //Relatorio de atendimentos
    function gerarRelatorio() {
        $chamados = lerChamadas();

        $relatorio = [
            "total" => count($chamados),
            "abertos" => 0,
            "andamento" => 0,
            "resolvidos" => 0
        ];

        foreach ($chamados as $chamado) {
            if ($chamado["status"]=== "Aberto"){
                $relatorio["abertos"]++;
            }
            else if ($chamado["status"]=== "Em andamento"){
                $relatorio["andamento"]++;
            }
            else if ($chamado["status"]=== "Resolvido"){
                $relatorio["resolvidos"]++;
            }
        }
        return $relatorio;

    }
?>