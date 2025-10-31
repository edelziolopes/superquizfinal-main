<?php

namespace Application\models;

use Application\core\Database;
use PDO;
class Respostas

{
  public static function salvar($id_pergunta, $alternativa_a, $alternativa_b, $alternativa_c, $alternativa_d, $respostas)
  {
    $conn = new Database();
    $result = $conn->executeQuery(
      'INSERT INTO tb_resposta 
      (id_pergunta, alternativa_a, alternativa_b, alternativa_c, alternativa_d, resposta) 
      VALUES (:ID_PERGUNTA, :ALTERNATIVA_A, :ALTERNATIVA_B, :ALTERNATIVA_C, :ALTERNATIVA_D, :RESPOSTA)', 
      array(
        ':ID_PERGUNTA' => $id_pergunta , 
        ':ALTERNATIVA_A' => $alternativa_a,
        ':ALTERNATIVA_B' => $alternativa_b,  
        ':ALTERNATIVA_C' => $alternativa_c,  
        ':ALTERNATIVA_D' => $alternativa_d,
        ':RESPOSTA' => $respostas)
);

    return $result->rowCount();
  }

  public static function excluir($id)
    {
      $conn = new Database();
      $result = $conn->executeQuery(
        'DELETE FROM tb_resposta WHERE id =:ID', 
      array(':ID' => $id)
  );
      return $result->rowCount();
    }

  public static function listarTudo()
  {
    $conn = new Database();
    $result = $conn->executeQuery(
      'SELECT r.id, 
      r.id_pergunta, 
      r.alternativa_a,
      r.alternativa_b,
      r.alternativa_c,
      r.alternativa_d, 
      r.resposta,
      p.pergunta 
      FROM tb_resposta r 
      JOIN tb_pergunta p ON r.id_pergunta=p.id;');
    return $result->fetchAll(PDO::FETCH_ASSOC);
  }

}

 /*  'SELECT p.id, 
      p.id_categoria, 
      p.pergunta, 
      c.nome 
      FROM tb_pergunta p 
      JOIN tb_categoria c ON p.id_categoria=c.id;'); */