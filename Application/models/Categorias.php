<?php

namespace Application\models;

use Application\core\Database;
use PDO;
class Categorias

{
  public static function salvar($nome)
  {
    $conn = new Database();
    $result = $conn->executeQuery(
      'INSERT INTO tb_categoria (nome) 
      VALUES (:NOME)', 
      array(
        ':NOME' => $nome)
);

    return $result->rowCount();
  }
  public static function excluir($id)
  {
    $conn = new Database();
    $result = $conn->executeQuery(
      'DELETE FROM tb_categoria WHERE id =:ID', 
    array(':ID' => $id)
);

    return $result->rowCount();
  }

  public static function listarTudo()
  {
    $conn = new Database();
    $result = $conn->executeQuery('
    SELECT * FROM tb_categoria');
    return $result->fetchAll(PDO::FETCH_ASSOC);
  }

  public static function listarPorId($id)
  {
    $conn = new Database();
    $result = $conn->executeQuery(
      'SELECT * FROM tb_categoria WHERE id = :ID', 
      array(':ID' => $id)
);
    return $result->fetch(PDO::FETCH_ASSOC);
  }

}