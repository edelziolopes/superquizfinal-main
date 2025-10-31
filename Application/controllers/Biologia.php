<?php

use Application\core\Controller;

class Biologia extends Controller
{
  public function index(){
    $Perguntas = $this->model('Perguntas');
    $data = $Perguntas::filtrar(5);
    //print_r($data); exit();
    $this->view('biologia/index', ['perguntas' => $data]);
  }
  

}