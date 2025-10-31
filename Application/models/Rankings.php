<?php

namespace Application\models;

use Application\core\Database;
use PDO;
class Rankings

{
  public static function salvar($id_usuario, $pontuacao)
  {
    $conn = new Database();
    $result = $conn->executeQuery(
      'INSERT INTO tb_ponto (id_usuario, pontuacao) 
      VALUES (:USUARIO, :PONTUACAO)', 
      array(
        ':USUARIO' => $id_usuario,
        ':PONTUACAO' => $pontuacao
        )
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

  public static function listarTudo($id)
  {
    $conn = new Database();
    $result = $conn->executeQuery('
    SELECT SUM(pontuacao) AS total_pontos FROM tb_ponto WHERE id_usuario = :ID',
    array(':ID' => $id)
  );
    return $result->fetchAll(PDO::FETCH_ASSOC);
  }

  public static function listarPorId($id)
  {
    $conn = new Database();
    $result = $conn->executeQuery(
          'SELECT
        id_usuario,
        SUM(pontuacao) AS pontuacao_total
    FROM
        tb_ponto
    WHERE
        id_usuario = :ID
    GROUP BY
        id_usuario;', 
          array(':ID' => $id)
    );
    return $result->fetch(PDO::FETCH_ASSOC);
  }

}