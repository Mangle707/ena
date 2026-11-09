<?php 


namespace App\Http\Controllers;

use App\Http\Controllers\Controller;//importa a base laravel
class IdadeController extends Controller{

    public function index(){
        //caminho para o portfolio.php dentro do Views que ta no resources
        return view('projetos.idade');//mudado aqui
    }

    
    // Adicione esta nova função para tratar o formulário POST
    public function calcular(Request $request) {
        // Pegar os dados que vieram do formulário
        $dados = $request->all();

        // Faça aqui a lógica do seu cálculo de idade...

        // Retorna a view enviando os resultados se necessário
        return view('projetos.api.idade', ['dados' => $dados]);
    }
}

?>