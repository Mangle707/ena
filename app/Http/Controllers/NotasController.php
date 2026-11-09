<?php 

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;//importa a base laravel
use Illuminate\Http\Request;
//Illuminate\Http\Request usado para o post para nao dar erro
class NotasController{

    public function index(){
       
        return view('projetos.notas');//mudado aqui
    }
    //Para tratar com post
    public function calcular(Request $request) {
        // Pegar os dados que vieram do formulário
        $dados = $request->all();
        return view('projetos.notas', ['dados' => $dados]);
    }
}

?>