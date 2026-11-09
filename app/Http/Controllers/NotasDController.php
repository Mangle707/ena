<?php 

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;//importa a base laravel
use Illuminate\Http\Request;
class NotasDController{

    public function index(){
        //caminho para o portfolio.php dentro do Views que ta no resources
        return view('projetos.notasD');//mudado aqui
    }
    public function calcular(Request $request) {
        // Pegar os dados que vieram do formulário
        $dados = $request->all();
        return view('projetos.notasD', ['dados' => $dados]);
    }
}

?>