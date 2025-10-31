<?php
    ob_start();
    require '../Application/autoload.php';
    use Application\core\App;
    use Application\core\Controller;
    session_start();
    $usuarioLogado = isset($_SESSION['usuario_logado']) ? $_SESSION['usuario_logado'] : null;
    $nomeUsuario = $usuarioLogado ? htmlspecialchars($usuarioLogado->nome) : 'Login';
?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SUPERQUIZZ - Início</title>
    <script src="https://cdn.tailwindcss.com"></script>
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
    <div class="min-h-screen bg-gradient-to-r from-purple-800 via-indigo-900 to-purple-900 p-6 md:p-8 animated-background">

        <header class="container mx-auto">
            <div class="flex justify-between items-center">
                <a href="/" class="text-3xl font-black rounded-lg px-4 py-2 bg-gradient-to-r from-purple-600 to-purple-700 shadow-md">
                    <span class="text-white">SUPER</span><span class="text-amber-400">QUIZZ</span>
                </a>
                <nav class="hidden md:flex items-center space-x-8">
                    <a href="/regra" class="text-gray-300 hover:text-amber-400 transition duration-300">Informações</a>
                    
                    <div class="relative" id="adm-menu-container">
                        <button id="adm-menu-btn" class="text-gray-300 hover:text-amber-400 transition duration-300 flex items-center focus:outline-none">
                            ADM
                            <svg class="w-4 h-4 ml-1" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg>
                        </button>
                        <div id="adm-dropdown" class="hidden absolute right-0 mt-2 w-48 bg-purple-800 rounded-lg shadow-xl py-2 z-20">
                            <a href="/categoria" class="block px-4 py-2 text-gray-300 hover:bg-purple-700 hover:text-amber-400 transition duration-300">Categorias</a>
                            <a href="/pergunta" class="block px-4 py-2 text-gray-300 hover:bg-purple-700 hover:text-amber-400 transition duration-300">Perguntas</a>
                            <a href="/resposta" class="block px-4 py-2 text-gray-300 hover:bg-purple-700 hover:text-amber-400 transition duration-300">Respostas</a>
                            <a href="/usuario" class="block px-4 py-2 text-gray-300 hover:bg-purple-700 hover:text-amber-400 transition duration-300">Usuários</a>
                        </div>
                    </div>

                    <?php if ($usuarioLogado): ?>
                    <div class="relative inline-block text-left" id="user-menu-container-desktop">
                        <button 
                            id="user-menu-btn-desktop"
                            class="bg-amber-400 text-purple-900 font-bold py-2 px-5 rounded-lg hover:bg-amber-300 transition duration-300 shadow-lg flex items-center focus:outline-none"
                            aria-expanded="false"
                            aria-haspopup="true"
                        >
                            <?= $nomeUsuario ?>
                            <svg class="w-4 h-4 ml-2" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg>
                        </button>

                        <div 
                            id="user-dropdown-desktop"
                            class="hidden origin-top-right absolute right-0 mt-2 w-48 rounded-md shadow-lg bg-white ring-1 ring-black ring-opacity-5 py-1 z-20"
                            role="menu" 
                            aria-orientation="vertical" 
                            aria-labelledby="user-menu-btn-desktop"
                        >
                            <a 
                                href="/ranking" 
                                class="text-gray-700 block px-4 py-2 text-sm hover:bg-gray-100 hover:text-red-600 transition duration-150" 
                                role="menuitem" 
                                tabindex="-1"
                            >
                                Ranking
                            </a>
                            <a 
                                href="/usuario/sair" 
                                class="text-gray-700 block px-4 py-2 text-sm hover:bg-gray-100 hover:text-red-600 transition duration-150" 
                                role="menuitem" 
                                tabindex="-1"
                            >
                                Sair
                            </a>
                        </div>
                    </div>
                    <?php else: ?>
                    <a href="/usuario/login" class="bg-amber-400 text-purple-900 font-bold py-2 px-5 rounded-lg hover:bg-amber-300 transition duration-300 shadow-lg">
                        Login
                    </a>
                    <?php endif; ?>
                </nav>
                
                <div class="md:hidden">
                    <button id="menu-btn" class="text-white focus:outline-none">
                        <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16m-7 6h7"></path></svg>
                    </button>
                </div>
            </div>
            
            <div id="mobile-menu" class="hidden md:hidden mt-4 bg-purple-800 rounded-lg p-4">
                <a href="/regra" class="block py-2 text-gray-300 hover:text-amber-400">Informações</a>
                
                <div>
                    <button id="adm-menu-btn-mobile" class="w-full text-left flex justify-between items-center py-2 text-gray-300 hover:text-amber-400 focus:outline-none">
                        <span>ADM</span>
                        <svg class="w-5 h-5 transform transition-transform duration-300" id="adm-arrow-mobile" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg>
                    </button>
                    <div id="adm-submenu-mobile" class="hidden pl-4 border-l-2 border-purple-700 ml-1">
                        <a href="/categoria" class="block py-2 text-gray-300 hover:text-amber-400">Categorias</a>
                        <a href="/pergunta" class="block py-2 text-gray-300 hover:text-amber-400">Perguntas</a>
                        <a href="/resposta" class="block py-2 text-gray-300 hover:text-amber-400">Respostas</a>
                        <a href="/usuario" class="block py-2 text-gray-300 hover:text-amber-400">Usuários</a>
                    </div>
                </div>

                <?php if ($usuarioLogado): ?>
                <div class="mt-2 border-t border-purple-700 pt-2">
                    <p class="block py-2 text-lg font-semibold text-amber-400 border-b border-purple-700 mb-2"><?= $nomeUsuario ?></p>
                    <a href="/usuario/sair" class="block py-2 pl-4 text-gray-300 hover:text-red-400 hover:bg-purple-700 rounded-md">Sair</a>
                </div>
                <?php else: ?>
                <a href="/usuario/login" class="block mt-4 text-center bg-amber-400 text-purple-900 font-bold py-2 px-5 rounded-lg hover:bg-amber-300 transition duration-300 shadow-lg">Login</a>
                <?php endif; ?>
            </div>
        </header>

        <script>
            // Lógica para o menu mobile
            const menuBtn = document.getElementById('menu-btn');
            const mobileMenu = document.getElementById('mobile-menu');

            menuBtn.addEventListener('click', () => {
                mobileMenu.classList.toggle('hidden');
            });

            // Lógica para o menu ADM (Desktop)
            const admMenuBtn = document.getElementById('adm-menu-btn');
            const admDropdown = document.getElementById('adm-dropdown');
            const admMenuContainer = document.getElementById('adm-menu-container');

            admMenuBtn.addEventListener('click', (event) => {
                event.stopPropagation(); // Impede a propagação
                admDropdown.classList.toggle('hidden');
                // Fecha o dropdown do usuário se estiver aberto
                const userDropdownDesktop = document.getElementById('user-dropdown-desktop');
                if (userDropdownDesktop && !userDropdownDesktop.classList.contains('hidden')) {
                    userDropdownDesktop.classList.add('hidden');
                }
            });

            // Lógica para o Dropdown de Usuário (Desktop) (NOVO)
            const userMenuBtnDesktop = document.getElementById('user-menu-btn-desktop');
            const userDropdownDesktop = document.getElementById('user-dropdown-desktop');
            const userMenuContainerDesktop = document.getElementById('user-menu-container-desktop');
            
            if (userMenuBtnDesktop) {
                userMenuBtnDesktop.addEventListener('click', (event) => {
                    event.stopPropagation(); // Impede a propagação
                    userDropdownDesktop.classList.toggle('hidden');
                    // Fecha o dropdown ADM se estiver aberto
                    if (!admDropdown.classList.contains('hidden')) {
                        admDropdown.classList.add('hidden');
                    }
                });
            }


            // Fecha qualquer dropdown se clicar fora de ambos
            document.addEventListener('click', (event) => {
                if (!admMenuContainer.contains(event.target)) {
                    admDropdown.classList.add('hidden');
                }
                if (userMenuContainerDesktop && !userMenuContainerDesktop.contains(event.target)) {
                    userDropdownDesktop.classList.add('hidden');
                }
            });

            // Lógica para o submenu ADM (Mobile)
            const admMenuBtnMobile = document.getElementById('adm-menu-btn-mobile');
            const admSubmenuMobile = document.getElementById('adm-submenu-mobile');
            const admArrowMobile = document.getElementById('adm-arrow-mobile');

            admMenuBtnMobile.addEventListener('click', () => {
                admSubmenuMobile.classList.toggle('hidden');
                admArrowMobile.classList.toggle('rotate-180');
            });
        </script>


        <?php
            $app = new App();
        ?>
    </div>
</body>
</html>