<?php

use Application\core\Controller;

class Arte extends Controller
{
  public function index(){
    $Perguntas = $this->model('Perguntas');
    $data = $Perguntas::filtrar(13);
    //print_r($data); exit();
    $this->view('arte/index', ['perguntas' => $data]);
  }
  

}