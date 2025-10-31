<?php

use Application\core\Controller;

class Resposta extends Controller
{
  public function index()
  {
    $Perguntas = $this->model('Perguntas');
    $todasPerguntas = $Perguntas::listarTudo();

    $Respostas = $this->model('Respostas');
    $todasRespostas = $Respostas::listarTudo();

    $this->view('resposta/index', [
      'perguntas' => $todasPerguntas,
      'respostas' => $todasRespostas
    ]);
  }
  public function salvar()
  {
    $id_pergunta = $_POST['txt_pergunta'];
    $alternativa_a = $_POST['alternativa_a'];
    $alternativa_b = $_POST['alternativa_b'];
    $alternativa_c = $_POST['alternativa_c'];
    $alternativa_d = $_POST['alternativa_d'];
    $resposta = $_POST['resposta'];
    
    $Respostas = $this->model('Respostas');
    $Respostas::salvar($id_pergunta, $alternativa_a, $alternativa_b, $alternativa_c, $alternativa_d, $resposta);

    $this->redirect('resposta/index');
  }

    public function excluir($id)
  {
    $Respostas = $this->model('Respostas');
    $Respostas::excluir($id);
    $this->redirect('resposta/index');
  }
}