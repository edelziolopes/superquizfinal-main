<?php

use Application\core\Controller;

class Portugues extends Controller
{
  public function index(){
    $Perguntas = $this->model('Perguntas');
    $data = $Perguntas::filtrar(4);
    //print_r($data); exit();
    $this->view('português/index', ['perguntas' => $data]);
  }
  

}