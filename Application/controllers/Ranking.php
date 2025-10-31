<?php

use Application\core\Controller;

class Ranking extends Controller
{
  public function index()
  {
    $Ranking = $this->model('Rankings');
    $data = $Ranking::listarTudo($_SESSION['usuario_logado']->id);
    $this->view('ranking/index', ['rankings' => $data]);
  }
  public function salvar($id_usuario, $pontuacao)  
  {

    $Ranking = $this->model('Rankings');
    $Ranking::salvar($id_usuario, $pontuacao);

    $this->redirect('ranking/index');
  }

}