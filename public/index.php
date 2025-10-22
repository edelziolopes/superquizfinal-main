<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SUPERQUIZZ - Início</title>
    <!-- Tailwind CSS CDN -->
    <script src="https://cdn.tailwindcss.com"></script>
    <!-- Google Fonts: Poppins -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600;700;900&display=swap" rel="stylesheet">
    <style>
        /* Estilos personalizados e animações para evitar modificar classes globais */
        body {
            font-family: 'Poppins', sans-serif;
        }

        /* Animação de flutuação para o logo */
        @keyframes floatAnimation {
            0%, 100% {
                transform: translateY(0);
            }
            50% {
                transform: translateY(-25px);
            }
        }

        .logo-animation {
            animation: floatAnimation 5s ease-in-out infinite;
        }

        /* Estilo para o logo com gradiente */
        .logo-gradient {
            background: linear-gradient(45deg, #FBBF24, #F59E0B);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
            text-fill-color: transparent;
        }
    </style>
</head>
<body class="bg-gray-900 text-white overflow-x-hidden">


  <?php
    require '../Application/autoload.php';
    use Application\core\App;
    use Application\core\Controller;
    $app = new App();
  ?>
</body>
</html>