<?php

use Application\core\Controller;

class Geografia extends Controller
{
  public function index(){
    $Perguntas = $this->model('Perguntas');
    $data = $Perguntas::filtrar(10);
    //print_r($data); exit();
    $this->view('geografia/index', ['perguntas' => $data]);
  }
  

}