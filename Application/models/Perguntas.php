<?php

namespace Application\models;

use Application\core\Database;
use PDO;
class Perguntas

{
  public static function salvar($id_categoria, $pergunta) // ✅ Singular
{
    $conn = new Database();
    $result = $conn->executeQuery(
      'INSERT INTO tb_pergunta 
      (id_categoria, pergunta) 
      VALUES (:ID_CATEGORIA, :PERGUNTA)', 
      array(
        ':ID_CATEGORIA' => $id_categoria , 
        ':PERGUNTA' => $pergunta) // Agora usa $pergunta
      );      

    return $result->rowCount();
}
 public static function excluir($id)
  {
    $conn = new Database();
    $result = $conn->executeQuery(
      'DELETE FROM tb_pergunta WHERE id =:ID', 
    array(':ID' => $id)
);
    return $result->rowCount();
  }

    public static function filtrar($id_categoria)
    {
        $conn = new Database();
        $result = $conn->executeQuery('SELECT 
                    p.pergunta AS Pergunta,
                    r.alternativa_a AS RespA,
                    r.alternativa_b AS RespB,
                    r.alternativa_c AS RespC,
                    r.alternativa_d AS RespD,
                    r.resposta AS Correta
                FROM 
                    tb_pergunta AS p
                JOIN 
                    tb_resposta AS r ON p.id = r.id_pergunta
                WHERE 
                    p.id_categoria = :ID_CATEGORIA;', 
      array(
        ':ID_CATEGORIA' => $id_categoria)
      ); 
        return $result->fetchAll(PDO::FETCH_ASSOC);
    }  

  public static function listarTudo()
  {
    $conn = new Database();
    $result = $conn->executeQuery(
      'SELECT p.id, 
      p.id_categoria, 
      p.pergunta, 
      c.nome 
      FROM tb_pergunta p 
      JOIN tb_categoria c ON p.id_categoria=c.id;');
    return $result->fetchAll(PDO::FETCH_ASSOC);
  }
  
}