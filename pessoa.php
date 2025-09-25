<?php
class Pessoa

{
    public string $nome;
    public string $telefone;
    public string $endereco;
    public ?int $id;

     public function __construct($nome, $telefone, $endereco, ?int $id = null) {
        $this->id = $id; //se não passar, fica null
        $this->nome = $nome;
        $this->telefone = $telefone;
        $this->endereco = $endereco;
        
     }

    public function toArray(){
        return [
            "nome" => $this->nome,
            "telefone" => $this->endereco
        ];                                                                                           
    }
}

class PessoaFisica extends Pessoa
{
    public string $CPF;

    public function __construct($nome, $telefone, $endereco, $CPF){
        
        parent::__construct($nome, $telefone, $endereco);
        $this->CPF = $CPF;
    }

}

class PessoaJuridica extends Pessoa
{
    public string $CNPJ;
    
    private array $socios = [];
    //public $socios = array(); (antes da correção)
    
    public function __construct($nome, $telefone, $endereco, $CNPJ){
        
        parent::__construct($nome, $telefone, $endereco);
        //$socios[pessoa];(antes da correção)
        $this->CNPJ = $CNPJ;
        }
    
    public function acrecentar(PessoaFisica $socio){
        array_push($this->socios, $socio);
        //ou $this->socios[] += $socio;
    }
}

//---------------------------Exemplos de Uso--------------------------------

$pf1 = new PessoaFisica("João","99999-1111","Rua A, 123","121.456.789.00");
$pf2 = new PessoaFisica("Maria","99999-2222","Rua B, 456","987.654.321.00");

$pj = new PessoaJuridica("Tech Ltda","3333-44444","Av.Central, 1000", "12.345.678/0001-99");
$pj->acrecentar($pf1);
$pj->acrecentar($pf2);

var_dump($pf1);
echo"<br>";
echo"<br>";
var_dump($pf2);
echo"<br>";
echo"<br>";
var_dump($pj);
echo"<br>";
echo"<br>";