<?php

use Application\core\Controller;

class Historia extends Controller
{
  public function index(){
    $Perguntas = $this->model('Perguntas');
    $data = $Perguntas::filtrar(11);
    //print_r($data); exit();
    $this->view('história/index', ['perguntas' => $data]);
  }
  

}