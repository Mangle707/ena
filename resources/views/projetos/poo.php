<?php
//POO = Programacao Orientada Objetos
         //Exemplo SEM POO
//$nome = "sabrina";
//$vida = 100;

//function atacar ($nome){
//   echo "$nome realizou um ataque";
//}

//atacar ($nome);
//___________________________________________________________//

//Exemplo com POO (Melhor e mais organizado)

//--ENCAPSULAMENTO
//Proteger informaçoes para que nao sejam alteradas de qualquer jeito.
//--HERANÇA
//Criar uma classe nova aproveitando caracteristicas de outra
//--POLIMORFISMO
//Permitir que objetos diferentes respondam a mesma acao de maneiras diferentes.
//--ABSTRACAO
//Mostrar o que é necessario e esconder detalhes complicados de funcionamento.
//____________________________________________________________//

//________________________________________________________________//
                    //1 o que é um classe?
                   //um molde para criar objetos

               //2 o que significa new personagem()?
               //criar um objeto da classe personagem

                    //3 para que serve $this->nome?
                    //Acessar o nome do objeto atual

                //4 o que significa extends?
                //Herdar caracteristicas e metodos de outra classe
//_________________________________________________________________//

//inicio do POO
class Personagem {
    public $nome;
    private $vida = 100;//mudado para um encapsulamento
    public $dano = 10;

    public function __construct($nome, $vida, $dano){
//usando o construct e mais facil para nao ter que escrever os personages em uma linha separada
        $this->nome = $nome;
        $this->vida = $vida;
        $this->dano = $dano;
    }
    //____________Funcoes vida____________________// 
    // GETTER
    public function getVida(){
           return $this->vida;
    }
    // SETTER
    public function setVida($vida){
       if($vida <= 0){
         echo "Voce morreu\n";
        return;
       }

       $this->vida = $vida;

    }
   //____________Funcao de ataque_________________//
    public function atacar(){
        echo "$this ->nome realizou um ataque!";
        //    esse    nome(personagem) realizou um ataque
    }
}
$sabrina = new Personagem("sabrina", 100, 10);

$sabrina->setVida(20);//exemplo de alteracao de vida

$Loona = new Personagem("Lonna", 100, 7);
$aurora = new Personagem("aurora", 100, 20);

$sabrina -> atacar(); // metodo proprio
//chama a funcao para o personagem atacar

//EXEMPLO DE HERANCA
class Guerreiro extends Personagem {
    public function defender(){
        echo "$this-> nome levantou o escudo!";
    }
}
//declara o tal personagem como guerreiro
$guerreiro = new Guerreiro("sabrina", 100,10);

$guerreiro->atacar(); //metodo herdado
$guerreiro->defender(); //Metodo proprio



?>