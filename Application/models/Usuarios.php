<?php

namespace Application\models;

use Application\core\Database;
use PDO;
class Usuarios
{
  public static function salvar($nome, $turma, $senha)
  {
    $conn = new Database();
    $result = $conn->executeQuery(
      'INSERT INTO tb_usuarios 
      (nome, turma, senha) 
      VALUES (:NOME, :TURMA, :SENHA)', 
      array(
        ':NOME' => $nome, 
        ':TURMA' => $turma,
        ':SENHA' => $senha
      )
    );      

    return $result->rowCount();
  }

  public static function excluir($id)
  {
    $conn = new Database();
    $result = $conn->executeQuery(
      'DELETE FROM tb_usuarios WHERE id = :ID', 
      array(':ID' => $id)
    );
    return $result->rowCount();
  }

  public static function listarTudo()
  {
    $conn = new Database();
    $result = $conn->executeQuery(
      'SELECT id, nome, turma, senha FROM tb_usuarios'
    );
    return $result->fetchAll(PDO::FETCH_ASSOC);
  }

    public static function buscarPorNome($nome)
    {
        $conn = new Database();
        $result = $conn->executeQuery(
            'SELECT id, nome, senha FROM tb_usuarios WHERE nome = :NOME',
            array(
                ':NOME' => $nome
            )
        );
        return $result->fetch(PDO::FETCH_OBJ);
    }
  
}