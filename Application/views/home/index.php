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
                    <a href="/sorteio" class="bg-amber-400 text-purple-900 font-bold text-base py-3 px-8 sm:text-lg sm:py-4 sm:px-10 rounded-lg hover:bg-amber-300 transition duration-300 transform hover:scale-105 shadow-2xl inline-block">
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
