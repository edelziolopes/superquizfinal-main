<?php

use Application\core\Controller;

class Fisica extends Controller
{
  public function index(){
    $Perguntas = $this->model('Perguntas');
    $data = $Perguntas::filtrar(15);
    //print_r($data); exit();
    $this->view('física/index', ['perguntas' => $data]);
  }
  

}