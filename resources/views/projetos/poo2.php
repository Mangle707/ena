<?php
//POO = Programacao Orientada Objetos / ARQUIVO 2
//=============================================
//SISTEMA CONTROLE DE PRODUÇAO INDUSTRIAL
//=============================================

//1.Classe ABSTRATA
abstract class Maquina {
    public $nome;
    private $producao;

    public function __construct($nome){
           $this->nome = $nome;
           $this->producao = 0;

    }
    //ENCAPSULAMENTO - GETTER
    public function getProducao(){
           return $this->producao;
    }

    //ENCAPSULAMENTO - ALTERACAO CONTROLADA
    public function registrarProducao($quantidade){
        if ($quantidade <= 0){
            return false;
        }
        $this->producao += $quantidade;
        return true;
    }
    // ABSTRAÇAO
    abstract public function operar();

}

//2. HERANCA
class Esteira extends Maquina {
      public function operar(){
        return "Transportando peças...";
      }
}
class Prensa extends Maquina {
    public function operar(){
        return "Transportando peças...";
    }
}
class RoboSoldagem extends Maquina {
    public function operar(){
        return "Transportando peças...";
    }
}

//3. SESSAO = ARMAZENAMENTO TEMPORÁRIO

if (!isset($_SESSION["maquinas"])){
    $_SESSION["maquinas"] = [];
}
$mensagem = "";

// 4. RECEBER FORMULARIO VIA POST

if ($_SERVER["REQUEST_METHOD"] === "POST"){
    $nome = $_POST["nome"] ?? "";
    $tipo = $_POST["tipo"] ?? "";
    $quantidade = $_POST["quantidade"] ?? null;
    
    if($nome === "" || $quantidade === false || $quantidade <= 0){

        $mensagem = "preencha os campos corretamente!";
    } else{
          // CRIANDO OBJETOS COM BASE NO FORMULARIO
          //laço para ver qual precisa ser enviado
          if($tipo === "esteira"){
            $maquina = new Esteira($nome);
          }
          else if ($tipo == "prensa"){

            $maquina = new Prensa($nome);
          }
          else if ($tipo == "Robo Soldagem"){

            $maquina = new RoboSoldagem($nome);
          }
          //EXECUTANDO OS MÉTODOS DO OBJETO
          $maquina->registrarProducao($quantidade);

          //GUARDANDO O OBJETO NA SESSAO
          $_SESSION["maquinas"][] = $maquina;

          $mensagem = "Maquina cadastrada com sucesso!";
    }

    
}

?>