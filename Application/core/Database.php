<?php

namespace Application\core;

use PDO;
class Database extends PDO
{
  // configuração do banco de dados
  //private $DB_NAME = 'quizz';private $DB_USER = 'root';private $DB_PASSWORD = '';private $DB_HOST = '127.0.0.1';private $DB_PORT = 3306;
  private $DB_HOST = 'srv1664.hstgr.io';
  private $DB_NAME = 'u344105464_quizz';
  private $DB_USER = 'u344105464_userquizz';
  private $DB_PASSWORD = 'Ind-2025';
  private $DB_PORT = 3306;

  // armazena a conexão
  private $conn;

  public function __construct()
  {
    //'mysql:host=localhost;dbname=meuBancoDeDados', $username, $password
    // Quando essa classe é instanciada, é atribuido a variável $conn a conexão com o db
    $this->conn = new PDO("mysql:host=$this->DB_HOST;dbname=$this->DB_NAME", $this->DB_USER, $this->DB_PASSWORD);
    // $this->conn = new PDO("mysql:dbname=$this->DB_NAME;host=$this->DB_HOST;port=$this->DB_PORT;user=$this->DB_USER;password=$this->DB_PASSWORD");
  }

  /**
  * Este método recebe um objeto com a query 'preparada' e atribui as chaves da query
  * seus respectivos valores.
  * @param  PDOStatement  $stmt   Contém a query ja 'preparada'.
  * @param  string        $key    É a mesma chave informada na query.
  * @param  string        $value  Valor de uma determinada chave.
  */
  private function setParameters($stmt, $key, $value)
  {
    $stmt->bindParam($key, $value);
  }

  /**
  * A responsabilidade deste método é apenas percorrer o array de com os parâmetros
  * obtendo as chaves e os valores para fornecer tais dados para setParameters().
  * @param  PDOStatement  $stmt         Contém a query ja 'preparada'.
  * @param  array         $parameters   Array associativo contendo chave e valores para fornece a query
  */
  private function mountQuery($stmt, $parameters)
  {
    foreach( $parameters as $key => $value ) {
      $this->setParameters($stmt, $key, $value);
    }
  }

  /**
  * Este método é responsável por receber a query e os parametros, preparar a query
  * para receber os valores dos parametros informados, chamar o método mountQuery,
  * executar a query e retornar para os métodos tratarem o resultado.
  * @param  string   $query       Instrução SQL que será executada no banco de dados.
  * @param  array    $parameters  Array associativo contendo as chaves informada na query e seus respectivos valores
  *
  * @return PDOStatement
  */
  public function executeQuery(string $query, array $parameters = [])
  {
    $stmt = $this->conn->prepare($query);
    $this->mountQuery($stmt, $parameters);
    $stmt->execute();
    return $stmt;
  }

}
