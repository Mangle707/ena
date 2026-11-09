<?php 


namespace App\Http\Controllers;

use App\Http\Controllers\Controller;//importa a base laravel
class IdadeController extends Controller{

    public function index(){
        //caminho para o portfolio.php dentro do Views que ta no resources
        return view('projetos.idade');//mudado aqui
    }
}

?>