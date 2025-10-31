<?php

use Application\core\Controller;

class Logistica extends Controller
{
  public function index(){
    $Perguntas = $this->model('Perguntas');
    $data = $Perguntas::filtrar(7);
    //print_r($data); exit();
    $this->view('logistica/index', ['perguntas' => $data]);
  }
  

}