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
            echo "Produto: $this->nome Quantidade vendida: $quantidade\n";
        }
        else{
            echo "$this->nome não possui estoque\n";
        }
     }

     public function resumo(){
        echo" $this->nome custa $this->preco e possui $this->estoque\n";
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

     public function aprovado(): bool{
        if($media>=6){
            echo "Você foi aprovado\n";
            return TRUE;
            
        }
        else{
            echo "Você foi reprovado\n";
            return FALSE;
            
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
        echo"valor adicionado, saldo atual: $this->saldo\n";
     }

     public function sacar(float $valor){
        if ($this->saldo>=$valor){
            $this->saldo -=$valor;
            echo "Saque executado, o seu saldo é: $this->saldo\n";
        }
        else{
            echo "Saldo insuficiente\n";
        }
     }

     public function transferir(ContaBancaria $destino, float $valor){
        if ($this->saldo >= $valor) {
        $this->saldo -= $valor;
        $destino->depositar($valor);
        echo "Transferência realizada com sucesso\n";
        }
        else{
            echo "Saldo insuficiente";
        }
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

//--------------------------CLASSE PEDIDO-------------------------------

class Mercadoria{
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

//--------------------------CLASSE TURMA-------------------------------

class Turma {
    public string $disciplina;
    private array $alunos = [];

    public function __construct(string $disciplina) {
        $this->disciplina = $disciplina;
    }

    public function adicionarAluno(string $nome, float $media) {
        $this->alunos[] = ['nome' => $nome, 'media' => $media];
    }

    public function melhorAluno(float $suaMedia) {
        $maior = 0;
        foreach ($this->alunos as $aluno) {
        if($aluno['media'] > $maior) {
        $maior = $aluno['media'];
        }
    }
        if($suaMedia >= $maior) {
            echo "Você é o melhor aluno.";
        } 
        
        else{
            echo "Você não é o melhor aluno.";
        }
    }

    public function ResultadoFinal(){
        foreach ($this->alunos as $aluno) {
        $nome = $aluno['nome'];
        $media = $aluno['media'];
        if ($media >= 6) {
            echo "$nome: Média = $media situação: APROVADO\n";
        }
        else{
            echo "$nome: Média = $media situação: REPROVADO\n";
        }

        }
    }
}

//--------------------------CLASSE AGENDA-------------------------------

class Agenda {
    private array $contatos = [];


    public function AdicionarContato(string $nome, string $telefone){
        $this->contatos[] = ['nome' => $nome, 'telefone' => $telefone];
    }

    public function RemoverContato(string $nome){
        foreach ($this->contatos as $index => $contato) {
        if ($contato['nome'] == $nome) {
        unset($this->contatos[$index]);
        return;
        }
    }
}
    public function BuscarContato(string $nome){
        foreach ($this->contatos as $contato) {
        if ($contato['nome'] == $nome) {
        return $contato['telefone'];
        }
        
        }

        return "Contato não encontrado.";
    }

    public function ListarContatos(){
        usort($this->contatos, function($a, $b) {
        return strcmp($a['nome'], $b['nome']);
    });

    foreach ($this->contatos as $contato) {
        echo "Nome: {$contato['nome']}, Telefone: {$contato['telefone']}\n";
        }
    }
}
