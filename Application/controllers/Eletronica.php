<?php

use Application\core\Controller;

class Eletronica extends Controller
{
  public function index(){
    $Perguntas = $this->model('Perguntas');
    $data = $Perguntas::filtrar(6);
    //print_r($data); exit();
    $this->view('eletrônica/index', ['perguntas' => $data]);
  }
  

}