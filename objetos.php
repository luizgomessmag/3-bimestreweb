<?php


//--------------------------CLASSE PRODUTO-------------------------------

class Produto{

    public string $nome;
    public float $preco;
    public int $estoque;

     public function __construct($nome, $preco, $estoque){
        
        $this->nome = $nome;
        $this->preco = $preco;
        $this->estoque = $estoque;
     }

     public function aplicarDesconto(float $percentual){
        $this->preco -= $this->preco * $percentual/100;
    }

     public function vender(int $quantidade){
        if($this->estoque>=$quantidade){
            $this->estoque-=$quantidade;
            echo "Produto: $this->nome Quantidade vendida: $quantidade";
        }
        else{
            echo "$this->nome não possui estoque";
        }
     }

     public function resumo(){
        echo" $this->nome custa $this->preco e possui $this->estoque";
        }
     
}

//--------------------------CLASSE ALUNO-------------------------------

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

//--------------------------CLASSE CONTABANCARIA-------------------------------

class ContaBancaria{

    public string $titular;
    public float $saldo;

     public function __construct($titular, $saldo){
        
        $this->titular = $titular;
        $this->saldo = $saldo;
     }

     public function depositar(float $valor){
        $this->saldo +=$valor;
        echo"valor adicionado, saldo atual: $this->$saldo";
     }

     public function sacar(float $valor){
        if ($this->saldo>=$this->$valor){
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

//--------------------------CLASSE BIBLIOTECA-------------------------------

class Biblioteca{


    public string $nome;
    private array $livros = [];

     public function __construct($nome){
        
        $this->nome = $nome;
     }

    public function AdicionarLivro(string $titulo){
        $this->livros[] = $titulo;
    }

    public function BuscarLivro(string $termo){
        $buscas = [];

        foreach ($this->livros as $livro) {
        if (stripos($livro, $termo) !== false) {
            $buscas[] = $livro;
            }
        }
        return $buscas;
    }   

    public function ListarLivros() {
        foreach ($this->livros as $livro) {
        echo "$livro\n";
        }
    }
}

//--------------------------PEDIDO-------------------------------

class Produto {
    public string $nome;
    public float $preco;

    public function __construct(string $nome, float $preco) {
        $this->nome = $nome;
        $this->preco = $preco;
    }
}

class Pedido {
    public string $cliente;
    private array $itens = [];

    public function __construct(string $cliente) {
        $this->cliente = $cliente;
    }

    public function AdicionarItem(Produto $produto, int $quantidade) {
        $this->itens[] = ['produto'=>$produto, 'quantidade'=>$quantidade];
    }

    public function Total(){
        $total = 0;
        foreach ($this->itens as $item) {
        $total += $item['produto']->preco * $item['quantidade'];
    }
        return $total;
    }

    public function detalhes(){
        echo "Pedido de: $this->cliente\n";
        echo "Itens:\n";

        foreach ($this->itens as $item) {
        $produto = $item['produto'];
        $quantidade = $item['quantidade'];
        $subtotal = $produto->preco * $quantidade;
        echo "{$produto->nome} x $quantidade = R$$subtotal\n";
    }

        echo "Total: R$ {$this->Total()}\n";
    }
}

//--------------------------TURMA-------------------------------
