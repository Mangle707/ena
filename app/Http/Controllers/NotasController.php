<?php 

class NotasController{

    public function index(){
        //caminho para o portfolio.php dentro do Views que ta no resources
        require __DIR__ . "/../../../resources/views/projetos/notas.php";
    }
}

?>