<?php
use Application\core\Controller;

class Usuario extends Controller
{
   public function index()
  {
    $Usuarios = $this->model('Usuarios');
    $data = $Usuarios::listarTudo();

    $this->view('usuario/index', [
      'usuarios' => $data
    ]);
  }

  public function salvar($fe=null)  
  {
    $nome = $_POST['nome'];
    $turma = $_POST['turma'];
    $senha = $_POST['senha'];

    $senhaHash = password_hash($senha, PASSWORD_DEFAULT);

    $Usuarios = $this->model('Usuarios');
    $Usuarios::salvar($nome, $turma, $senhaHash);

    if ($fe) {
      $this->redirect('/usuario/login');
      return;
    } else {
      $this->redirect('usuario/index');
    }
  }

  public function excluir($id)
  {
    $Usuarios = $this->model('Usuarios');
    $Usuarios::excluir($id);
    $this->redirect('usuario/index');
  }


public function login()  
  { 
    if(!isset($_POST['nome']) || !isset($_POST['senha'])) {
      $this->view('usuario/login');
      return;
    }

    $nome = $_POST['nome'];
    $senha = $_POST['senha'];

    $Usuarios = $this->model('Usuarios');
    $Usuarios::login($nome, $senha);

    $this->redirect('usuario/index');
  }

public function cadastro()  
  { 
    if(!isset($_POST['nome']) || !isset($_POST['turma']) || !isset($_POST['senha'])) {
      $this->view('usuario/cadastro');
      return;
    }

    $nome = $_POST['nome'];
    $turma = $_POST['turma'];
    $senha = $_POST['senha'];

    $Usuarios = $this->model('Usuarios');
    $Usuarios::cadastro($nome, $turma, $senha);

    $this->redirect('usuario/index');
  }

  public function entrar()
  {
    
      if ($_SERVER['REQUEST_METHOD'] == 'POST') {
          $nome = $_POST['nome_usuario'];
          $senha = $_POST['senha'];

          $Usuarios = $this->model('Usuarios');
          $usuario = $Usuarios::buscarPorNome($nome);

          if ($usuario && password_verify($senha, $usuario->senha)) {
              session_start();
              $_SESSION['usuario_logado'] = $usuario;
              //print_r($_SESSION['usuario_logado']); exit;
              $this->redirect('/ranking');
          } else {
              $this->view('usuario/login', ['erro' => 'Nome ou senha inválidos.']);
          }
      } else {
          $this->view('usuario/login');
      }
  }
  public function sair()
  {
      session_start();
      session_unset();
      session_destroy();
      $this->redirect('/home');
  }  

}