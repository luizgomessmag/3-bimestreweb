<?php
require_once "config.php";
require_once 'pessoa.php';
class Database
{
    private $conn;

    public function __construct() {
        try{
            //conexão ao mysql sem definir o banco
            $this->conn = new PDO("mysql:host=".DB_HOST,
                 DB_USER, DB_PASS);
            $this->conn->setAttribute(PDO::ATTR_ERRMODE,
                PDO::ERRMODE_EXCEPTION);

            //criação do banco se não existir
            $this->conn->exec("CREATE DATABASE IF NOT EXISTS ".DB_NAME);

            //Conectar ao banco
            $this->conn = new PDO("mysql:host=".DB_HOST.";dbname=".DB_NAME,
                DB_USER, DB_PASS);
        } catch (PDOException $e) {
            die("Erro de conexão: " . $e->getMessage());
        }
    }

    public function criarTabela($comando) {
        /**
         *   " usuarios(
         *   id INT AUTO_INCREMENT PRIMARY KEY,
         *   nome VARCHAR(100) NOT NULL,
         *   email VARCHAR(100) UNIQUE NOT NULL)
         * "
         */
        try {
            $sql = "CREATE TABLE IF NOT EXISTS $comando";
            $this->conn->exec($sql);
            echo "Tabela criada/verificada com sucesso.<br>";
        } catch (PDOException $e) {
            echo "Erro ao criar tabela: " . $e->getMessage();
        }
    }

    // Inserir registros (genérico)
    public function inserir($tabela, $dados) {
        
        // $tabela = "usuarios"
        // $dados = ["nome" => "João", "email" => "joao@gmail.com"]
        
        $colunas = implode(", ", array_keys($dados));
        $placeholders = ":" . implode(", :", array_keys($dados));

        $sql = "INSERT IGNORE INTO $tabela ($colunas) VALUES ($placeholders)";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute($dados);

        
    }

    public function buscarTodos($tabela){
            $sql = "select * from $tabela";
            $stmt = $this->conn->query($sql);
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        }

        public function buscarPessoas(){
            $sql = "SELECT * FROM pessoas";
            $stmt = $this->conn->query($sql);
            $dados = $stmt->fetchAll(PDO::FETCH_ASSOC);
            foreach ($dados as $dado){
                $pessoa = new Pessoa($dado['id'], $dado['nome'], $dado['telefone'], $dado['endereco']);
                array_push($pessoas, $pessoa);          
            }
        }
}
     
$db = new Database();
$dadosPessoas = $db->buscarTodos('pessoas');
var_dump($dadosPessoas);

$db->criarTabela("usuarios(
    id INT AUTO_INCREMENT PRIMARY KEY,
    nome VARCHAR(100) NOT NULL,
    email VARCHAR(100) UNIQUE NOT NULL,
    telefone VARCHAR(100) UNIQUE NOT NULL,
    endereco VARCHAR(255) NOT NULL
)");

$pf1 = new Pessoa("João", "99999-1111", "Rua A, 123");
$pf2 = new Pessoa("Maria", "99999-2222", "Rua B, 456");
$db->inserir("pessoas", $pf1->toArray());
$db->inserir("pessoas", $pf2->toArray());

$db->inserir("usuarios", ["nome" => "Luiz Henrique Gomes", "email" => "luiz.gomes@estudante.ifmt.edu.br"]);
$db->inserir("usuarios", ["nome" => "Gabriel Antonio Andrighetto", "email" => "g.andrighetto@estudante.ifmt.edu.br"]);

$dados = $db->buscarTodos('usuarios');
var_dump($dados);
echo "<h1>" . $dados[0]['nome'] . "</h1><br>";
echo "<h1>" . $dados[1]['nome'] . "</h1><br>";