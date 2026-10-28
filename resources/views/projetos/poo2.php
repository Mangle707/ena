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
}

?>