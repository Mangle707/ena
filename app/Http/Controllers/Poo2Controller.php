<?php 

class Poo2Controller{

    public function index(){
        //caminho para o portfolio.php dentro do Views que ta no resources
        require __DIR__ . "/../../../resources/views/projetos/poo2.php";
    }
}

?>