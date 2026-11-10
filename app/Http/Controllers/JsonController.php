<?php 

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class JsonController extends Controller
{
    // Função auxiliar para pegar o caminho do arquivo JSON no storage
    private function getCaminhoJson()
    {
        return storage_path('data/dados.json');
    }

    // Função auxiliar para ler os dados do JSON
    private function lerAlunos()
    {
        $caminho = $this->getCaminhoJson();

        if (file_exists($caminho)) {
            $json = file_get_contents($caminho);
            return json_decode($json, true) ?? [];
        }

        return [];
    }

    // Função auxiliar para salvar o array atualizado no arquivo JSON
    private function salvarNoArquivo(array $alunos)
    {
        $caminho = $this->getCaminhoJson();

        if (!file_exists(dirname($caminho))) {
            mkdir(dirname($caminho), 0755, true);
        }

        file_put_contents(
            $caminho,
            json_encode($alunos, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE)
        );
    }

    // Exibe a página com a lista de alunos
    public function index()
    {
        $alunos = $this->lerAlunos();
        return view('projetos.Json', compact('alunos'));
    }

    // Processa os envios de formulário (cadastrar, atualizar, deletar)
    public function salvar(Request $request) 
    {
        $acao = $request->input('acao');
        $alunos = $this->lerAlunos();

        // 1. CADASTRAR
        if ($acao === 'cadastrar') {
            $novoAluno = [
                "nome"  => $request->input('nome'),
                "idade" => $request->input('idade'),
                "curso" => $request->input('curso')
            ];

            $alunos[] = $novoAluno;
            $this->salvarNoArquivo($alunos);
        }

        // 2. ATUALIZAR
        if ($acao === 'atualizar') {
            $nome = $request->input('nome');
            $novaIdade = $request->input('idade');
            $novoCurso = $request->input('curso');

            foreach ($alunos as $posicao => $aluno) {
                if (isset($aluno['nome']) && $aluno['nome'] === $nome) {
                    $alunos[$posicao]['idade'] = $novaIdade;
                    $alunos[$posicao]['curso'] = $novoCurso;
                }
            }

            $this->salvarNoArquivo($alunos);
        }

        // 3. DELETAR
        if ($acao === 'deletar') {
            $nome = $request->input('nome');

            foreach ($alunos as $posicao => $aluno) {
                if (isset($aluno['nome']) && $aluno['nome'] === $nome) {
                    unset($alunos[$posicao]);
                }
            }

            $alunos = array_values($alunos); // Reorganiza os índices do array
            $this->salvarNoArquivo($alunos);
        }

        return redirect()->back();
    }
}