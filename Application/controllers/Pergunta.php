<?php

use Application\core\Controller;

class Pergunta extends Controller
{
   public function index()
  {
    $Categorias = $this->model('Categorias');
    $data = $Categorias::listarTudo();

    $Perguntas = $this->model('Perguntas');
    $data2 = $Perguntas::listarTudo();

    $this->view('pergunta/index', [
      'categorias' => $data,
      'perguntas' => $data2
    ]);
  }

  public function salvar()  
  {
    $id_categoria = $_POST['txt_categoria'];
    $pergunta = $_POST['txt_pergunta'];

    $Perguntas = $this->model('Perguntas');
    $Perguntas::salvar($id_categoria, $pergunta);

    $this->redirect('pergunta/index');
    //$this->view('pergunta/index');
  }

  public function excluir($id)
  {
    $Perguntas = $this->model('Perguntas');
    $Perguntas::excluir($id);
    $this->redirect('pergunta/index');
  }

  
}