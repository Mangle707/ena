<?php
//POO = Programacao Orientada Objetos
         //Exemplo SEM POO
//$nome = "sabrina";
//$vida = 100;

//function atacar ($nome){
//   echo "$nome realizou um ataque";
//}

//atacar ($nome);
//___________________________________________________________

//Exemplo com POO (Melhor e mais organizado)

//--ENCAPSULAMENTO
//Proteger informaçoes para que nao sejam alteradas de qualquer jeito.
//--HERANÇA
//Criar uma classe nova aproveitando caracteristicas de outra
//--POLIMORFISMO
//Permitir que objetos diferentes respondam a mesma acao de maneiras diferentes.
//--ABSTRACAO
//Mostrar o que é necessario e esconder detalhes complicados de funcionamento.
class Personagem {
    public $nome;
    public $vida = 100;
    public $dano = 10;

    public function __construct($nome, $vida, $dano){
//usando o construct e mais facil para nao ter que escrever os personages em uma linha separada
        $this->nome = $nome;
        $this->vida = $vida;
        $this->dano = $dano;
    }

    public function atacar(){
        echo "$this ->nome realizou um ataque!";
        //    esse    nome(personagem) realizou um ataque
    }
}
$sabrina = new Personagem("sabrina", 100, 10);
$Loona = new Personagem("Lonna", 100, 7);
$aurora = new Personagem("aurora", 100, 20);

?>