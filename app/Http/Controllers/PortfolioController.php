<?php 

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;

class PortfolioController extends Controller {

    public function index(){
        //caminho para o portfolio.php dentro do Views que ta no resources
        return view('portfolio');
    }
}

?>