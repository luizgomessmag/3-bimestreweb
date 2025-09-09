<?php


//--------------------------CLASS PRODUTO-------------------------------

class Produto{

    public string $nome;
    public string $preco;
    public string $estoque;

     public function __construct($nome, $preco, $estoque){
        
        $this->nome = $nome;
        $this->preco = $preco;
        $this->estoque = $estoque;
     }

     public function aplicarDesconto(float $percentual){
        $this->preco -= $this->preco * $percentual/100;
    }

     public function vender(int $quantidade){
        if(this->$estoque>=$quantidade){
            $this->$estoque-=$quantidade;
            echo "Produto: $this->$nome Quantidade vendida: $this->$quantidade";
        }
        else{
            echo "$this->$nome não possui estoque";
        }
     }

     public function resumo(){
        echo" $this->$nome custa $this->$preco e possui $this->$estoque";
        }
     
}

//--------------------------CLASS ALUNO-------------------------------

Class Aluno{

    public string $nome;
    public string $matricula;
    private array $notas = [];

     public function __construct($nome, $matricula){
        
        $this->nome = $nome;
        $this->matricula = $matricula;
     }

     public function AdicionarNota(float $nota){
        $this->notas[] = $nota;
     }

     public function media(float $media){
        for($x = 0; sizeof($this->notas)>$x;$x++){
            $media += $this->$notas[$x];
        }
        media/sizeof($this->notas);
     }

     public function aprovado(){
        if($media>=6){
            return TRUE;
            echo "Você foi aprovado";
        }
        else{
            return FALSE;
            echo "Você foi reprovado";
        }
     }
}

//--------------------------CLASS CONTABANCARIA-------------------------------

class ContaBancaria{

    public string $titular;
    public string $saldo;

     public function __construct($titular, $saldo){
        
        $this->titular = $titular;
        $this->saldo = $saldo;
     }

     public function depositar(float $valor){
        $this->saldo +=$valor;
        echo"valor adicionado, saldo atual: $this->$saldo";
     }

     public function sacar(float $valor){
        if ($this->$saldo>=$this->$valor){
            $this->saldo -=$valor;
            echo "Saque executado, o seu saldo é: $this->$saldo";
        }
        else{
            echo "Saldo insuficiente";
        }
     }

     public function transferir(ContaBancaria $destino, float $valor){
        $destino += $valor;
        $this->$saldo -= $valor;
        echo "Transferência realizada com sucesso";
     }
}

//--------------------------BIBLIOTECA-------------------------------