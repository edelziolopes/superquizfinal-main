<?php

use Application\core\Controller;

class Ranking extends Controller
{
  public function index()
  {
    $this->view('ranking/index');
  }

}