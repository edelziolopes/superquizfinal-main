<?php

use Application\core\Controller;

class Sistema extends Controller
{
  public function index(){
    $Perguntas = $this->model('Perguntas');
    $data = $Perguntas::filtrar(4);
    //print_r($data); exit();
    $this->view('sistema/index', ['perguntas' => $data]);
  }
  

}