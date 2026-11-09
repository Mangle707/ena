<?php 

class LoginController{

    public function index(){
        //caminho para o portfolio.php dentro do Views que ta no resources
        return view('projetos.login-basico');//tem que ser o nome do arquivo
    }

    public function salvar(Request $request) {
        // Pegar os dados que vieram do formulário
        $dados = $request->all();
        return view('projetos.login-basico', ['dados' => $dados]);
    }
}

?>