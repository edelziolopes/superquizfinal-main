<?php

use Application\core\Controller;

class Quimica extends Controller
{
  public function index(){
    $Perguntas = $this->model('Perguntas');
    $data = $Perguntas::filtrar(14);
    //print_r($data); exit();
    $this->view('química/index', ['perguntas' => $data]);
  }
  

}