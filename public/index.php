<!DOCTYPE html>
<html lang="pt-br">
  <head>
    <meta charset="utf-8">
    <title>Simple Framework</title>
    <?php if (($_SERVER['REQUEST_URI'] === '/home') || ($_SERVER['REQUEST_URI'] === '/')): ?>
      <script src="https://cdn.tailwindcss.com"></script>
      <link rel="stylesheet" href="/assets/css/home.css">
    <?php else: ?>
      <link rel="stylesheet" href="/assets/css/bootstrap.min.css">
      <link rel="stylesheet" href="/assets/css/style.css">
    <?php endif; ?>
  </head>

<?php if (($_SERVER['REQUEST_URI'] === '/ranking')) ?>
      <script src="https://cdn.tailwindcss.com"></script>

<body class="bg-custom-gradient text-white h-screen flex flex-col">

  <?php if (($_SERVER['REQUEST_URI'] === '/home') || ($_SERVER['REQUEST_URI'] === '/')): ?>
  <!-- Tailwind -->
  <?php else: ?>

 
    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav ms-auto">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="/sorteio">Sorteio</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="/home">home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="/categoria">Categoria</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="/pergunta">Pergunta</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="/usuario">Usuario</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="/resposta">Resposta</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="/usuario/login">Login</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="/usuario/cadastro">Regra</a>
        </li>
      </ul>
    </div>
  </div>
</nav>
    <?php endif; ?>


  <?php
    require '../Application/autoload.php';
    use Application\core\App;
    use Application\core\Controller;

    $app = new App();

  ?>
  <?php if (($_SERVER['REQUEST_URI'] === '/home') || ($_SERVER['REQUEST_URI'] === '/')): ?>
    <script>
        document.addEventListener('DOMContentLoaded', () => {
            const menuButton = document.getElementById('menu-button');
            const closeMenuButton = document.getElementById('close-menu');
            const mobileMenu = document.getElementById('mobile-menu');
OiOi . 
            menuButton.addEventListener('click', () => {
                mobileMenu.classList.remove('hidden');
            });

            closeMenuButton.addEventListener('click', () => {
                mobileMenu.classList.add('hidden');
            });
        });
    </script>
  <?php else: ?>
    <script src="/assets/js/jquery.slim.min.js"></script>
    <script src="/assets/js/bootstrap.min.js"></script>
    <script src="/assets/js/ranking.js"></script>
  <?php endif; ?>
  </body>
</html>
