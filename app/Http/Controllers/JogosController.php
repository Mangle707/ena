<?php 
namespace App\Http\Controllers;

use App\Http\Controllers\Controller;//importa a base laravel
use Illuminate\Http\Request;
class JogosController{

    public function index(){
        //caminho para o portfolio.php dentro do Views que ta no resources
        return view('projetos.jogos');
    }
    public function salvar(Request $request) {
        // Pegar os dados que vieram do formulário
        $dados = $request->all();
        return view('projetos.jogos', ['dados' => $dados]);
    }
}

?>