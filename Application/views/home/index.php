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
        
        /* Animação para o background gradiente */
        @keyframes moveGradient {
            0%, 100% {
                background-position: 0% 50%;
            }
            50% {
                background-position: 100% 50%;
            }
        }

        .animated-background {
            background-size: 300% 300%;
            animation: moveGradient 15s ease infinite;
        }

        .logo-animation {
            animation: floatAnimation 5s ease-in-out infinite;
        }

        /* Estilo para o texto com gradiente */
        .text-gradient {
            background: linear-gradient(45deg, #FBBF24, #F59E0B);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
            text-fill-color: transparent;
        }
    </style>
</head>
<body class="bg-gray-900 text-white overflow-x-hidden">

    <!-- Container principal da página inicial com background animado -->
    <div class="min-h-screen bg-gradient-to-r from-purple-800 via-indigo-900 to-purple-900 p-6 md:p-8 animated-background">

        <!-- Header -->
        <header class="container mx-auto">
            <div class="flex justify-between items-center">
                <!-- Logo -->
                <a href="/" class="text-3xl font-black rounded-lg px-4 py-2 bg-gradient-to-r from-purple-600 to-purple-700 shadow-md">
                    <span class="text-white">SUPER</span><span class="text-amber-400">QUIZZ</span>
                </a>
                <!-- Navegação -->
                <nav class="hidden md:flex items-center space-x-8">
                    <a href="/informacoes" class="text-gray-300 hover:text-amber-400 transition duration-300">Informações</a>
                    <!-- Dropdown ADM -->
                    <div class="relative" id="adm-menu-container">
                        <button id="adm-menu-btn" class="text-gray-300 hover:text-amber-400 transition duration-300 flex items-center focus:outline-none">
                            ADM
                            <svg class="w-4 h-4 ml-1" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg>
                        </button>
                        <div id="adm-dropdown" class="hidden absolute right-0 mt-2 w-48 bg-purple-800 rounded-lg shadow-xl py-2 z-20">
                            <a href="/categoria" class="block px-4 py-2 text-gray-300 hover:bg-purple-700 hover:text-amber-400 transition duration-300">Categorias</a>
                            <a href="/pergunta" class="block px-4 py-2 text-gray-300 hover:bg-purple-700 hover:text-amber-400 transition duration-300">Perguntas</a>
                            <a href="/resposta" class="block px-4 py-2 text-gray-300 hover:bg-purple-700 hover:text-amber-400 transition duration-300">Respostas</a>
                        </div>
                    </div>
                    <a href="/login" class="bg-amber-400 text-purple-900 font-bold py-2 px-5 rounded-lg hover:bg-amber-300 transition duration-300 shadow-lg">
                        Login
                    </a>
                </nav>
                 <!-- Menu Mobile (Ícone) -->
                <div class="md:hidden">
                    <button id="menu-btn" class="text-white focus:outline-none">
                        <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16m-7 6h7"></path></svg>
                    </button>
                </div>
            </div>
             <!-- Menu Mobile (Dropdown) -->
            <div id="mobile-menu" class="hidden md:hidden mt-4 bg-purple-800 rounded-lg p-4">
                <a href="/informacoes" class="block py-2 text-gray-300 hover:text-amber-400">Informações</a>
                <!-- Submenu ADM Mobile -->
                <div>
                    <button id="adm-menu-btn-mobile" class="w-full text-left flex justify-between items-center py-2 text-gray-300 hover:text-amber-400 focus:outline-none">
                        <span>ADM</span>
                        <svg class="w-5 h-5 transform transition-transform duration-300" id="adm-arrow-mobile" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg>
                    </button>
                    <div id="adm-submenu-mobile" class="hidden pl-4 border-l-2 border-purple-700 ml-1">
                        <a href="/categoria" class="block py-2 text-gray-300 hover:text-amber-400">Categorias</a>
                        <a href="/pergunta" class="block py-2 text-gray-300 hover:text-amber-400">Perguntas</a>
                        <a href="/resposta" class="block py-2 text-gray-300 hover:text-amber-400">Respostas</a>
                    </div>
                </div>
                <a href="/login" class="block mt-2 text-center bg-amber-400 text-purple-900 font-bold py-2 px-5 rounded-lg hover:bg-amber-300 transition duration-300 shadow-lg">Login</a>
            </div>
        </header>

        <!-- Seção Principal -->
        <main class="container mx-auto flex flex-col md:flex-row items-center justify-center text-center md:text-left h-full mt-16 md:mt-24">
            <!-- Coluna de Texto -->
            <div class="md:w-1/2 lg:w-3/5 xl:w-1/2 z-10">
                <h1 class="text-4xl sm:text-5xl md:text-6xl lg:text-7xl font-black text-white uppercase leading-tight tracking-wide">
                    Jogar Quizz nunca foi tão <span class="text-gradient">interativo!</span>
                </h1>
                <p class="mt-6 text-lg md:text-xl text-gray-300 max-w-lg mx-auto md:mx-0">
                    Teste seus conhecimentos em diversas categorias e desafie seus amigos para ver quem é o mais esperto!
                </p>
                <div class="mt-10">
                    <a href="/categoria" class="bg-amber-400 text-purple-900 font-bold text-base py-3 px-8 sm:text-lg sm:py-4 sm:px-10 rounded-lg hover:bg-amber-300 transition duration-300 transform hover:scale-105 shadow-2xl inline-block">
                        Começar a Jogar!
                    </a>
                </div>
            </div>
            
            <!-- Coluna da Animação -->
            <div class="w-full md:w-1/2 lg:w-2/5 xl:w-1/2 mt-12 md:mt-0 flex justify-center items-center">
                <div class="logo-animation w-64 h-64 md:w-80 md:h-80 lg:w-96 lg:h-96 bg-purple-700/40 rounded-full flex justify-center items-center shadow-2xl backdrop-blur-sm border border-white/10">
                    <div class="w-48 h-48 md:w-60 md:h-60 lg:w-72 lg:h-72 bg-purple-800/60 rounded-full flex justify-center items-center">
                       <svg xmlns="http://www.w3.org/2000/svg" class="w-24 h-24 md:w-32 md:h-32 text-amber-400" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                          <path stroke-linecap="round" stroke-linejoin="round" d="M9.663 17h4.673M12 3v1m6.364 1.636l-.707.707M21 12h-1M4 12H3m3.343-5.657l-.707-.707m2.828 9.9a5 5 0 117.072 0l-.548.547A3.374 3.374 0 0014 18.469V19a2 2 0 11-4 0v-.531c0-.895-.356-1.754-.988-2.386l-.548-.547z" />
                        </svg>
                    </div>
                </div>
            </div>
        </main>
    </div>

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
            event.stopPropagation(); // Impede que o evento de clique se propague para o document
            admDropdown.classList.toggle('hidden');
        });

        // Fecha o dropdown se clicar fora dele
        document.addEventListener('click', (event) => {
            if (!admMenuContainer.contains(event.target)) {
                admDropdown.classList.add('hidden');
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

