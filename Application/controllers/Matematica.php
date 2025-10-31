<?php

use Application\core\Controller;

class Matematica extends Controller
{
  public function index(){
    $Perguntas = $this->model('Perguntas');
    $data = $Perguntas::filtrar(2);
    //print_r($data); exit();
    $this->view('matemática/index', ['perguntas' => $data]);
  }
  

}