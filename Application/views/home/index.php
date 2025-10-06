    <header class="flex justify-between items-center p-6 sm:p-8">
        <div class="flex items-center space-x-4">
            <!-- Espaço para a logo -->
            <div class="text-3xl sm:text-4xl font-black rounded-lg p-2 bg-gradient-to-r from-purple-500 to-indigo-600 shadow-lg cursor-pointer">
                <span class="text-white">SUPER<span class="text-yellow-300">QUIZZ</span></span>
            </div>
        </div>
        <nav class="hidden md:flex items-center space-x-8 text-lg font-medium">
            <a href="/regra/" class="hover:text-yellow-300 transition-colors duration-300">INFORMAÇÕES</a>
            <a href="/usuario/login" class="hover:text-yellow-300 transition-colors duration-300">LOGIN</a>
            <a href="/categoria" class="hover:text-yellow-300 transition-colors duration-300">Categoria</a>
            <a href="/pergunta" class="hover:text-yellow-300 transition-colors duration-300">Pergunta</a>
            <a href="/resposta" class="hover:text-yellow-300 transition-colors duration-300">Resposta</a>
        </nav>
        <div class="md:hidden flex items-center">
            <button id="menu-button" class="text-white focus:outline-none">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16m-7 6h7" />
                </svg>
            </button>
        </div>
    </header>
    <!-- Menu Mobile (invisível por padrão) -->
    <div id="mobile-menu" class="hidden md:hidden absolute top-0 left-0 w-full h-full bg-custom-gradient z-50 flex flex-col items-center justify-center space-y-8 text-2xl font-bold transition-all duration-300 transform scale-100 opacity-100">
        <button id="close-menu" class="absolute top-6 right-6 text-white focus:outline-none">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-10 w-10" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
            </svg>
        </button>
        <a href="/regra/" class="hover:text-yellow-300 transition-colors duration-300">INFORMAÇÕES</a>
        <a href="/usaurio/login" class="hover:text-yellow-300 transition-colors duration-300">LOGIN</a>
    </div>

<!-- Main Content -->
    <main class="flex-1 flex flex-col md:flex-row items-center justify-center p-6 sm:p-8">
        <!-- Text and CTA -->
        <div class="flex-1 text-center md:text-left md:pr-16 mb-12 md:mb-0">
            <h1 class="text-4xl sm:text-5xl lg:text-7xl font-extrabold mb-4 leading-tight">
                JOGAR QUIZZ NUNCA FOI TÃO INTERATIVO!
            </h1>
            <p class="text-lg sm:text-xl lg:text-2xl text-gray-300 mb-8 max-w-xl mx-auto md:mx-0">
                Teste seus conhecimentos em diversas categorias e desafie seus amigos para ver quem é o mais esperto!
            </p>
            <div class="flex flex-col sm:flex-row items-center justify-center md:justify-start space-y-4 sm:space-y-0 sm:space-x-4">
                <a href="/usuario/login" class="bg-yellow-400 hover:bg-yellow-300 transition-colors duration-300 text-black font-bold py-4 px-8 rounded-full shadow-lg text-lg sm:text-xl transform hover:scale-105 active:scale-95">
                    COMEÇAR A JOGAR
                </a>
                <!-- Placeholder for social media icons -->
                <div class="flex space-x-4">
                    <a href="#" class="text-gray-300 hover:text-white transition-colors duration-300">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8" viewBox="0 0 24 24" fill="currentColor"><path d="M12 2C6.477 2 2 6.477 2 12s4.477 10 10 10 10-4.477 10-10S17.523 2 12 2zm4 12c.707 0 1.25-.543 1.25-1.25s-.543-1.25-1.25-1.25-1.25.543-1.25 1.25.543 1.25 1.25 1.25zm-8-3c-.707 0-1.25.543-1.25 1.25s.543 1.25 1.25 1.25 1.25-.543 1.25-1.25-.543-1.25-1.25-1.25zm5 4.5c.915 0 1.66-.745 1.66-1.66s-.745-1.66-1.66-1.66-1.66.745-1.66 1.66.745 1.66 1.66 1.66zm0-1c.368 0 .667-.299.667-.667s-.299-.667-.667-.667-.667.299-.667.667.299.667.667.667zM12 4.5c-3.13 0-5.66 2.53-5.66 5.66s2.53 5.66 5.66 5.66 5.66-2.53 5.66-5.66-2.53-5.66-5.66-5.66z"/></svg>
                    </a>
                    <a href="#" class="text-gray-300 hover:text-white transition-colors duration-300">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8" viewBox="0 0 24 24" fill="currentColor"><path d="M12 2C6.477 2 2 6.477 2 12s4.477 10 10 10 10-4.477 10-10S17.523 2 12 2zm4 12c.707 0 1.25-.543 1.25-1.25s-.543-1.25-1.25-1.25-1.25.543-1.25 1.25.543 1.25 1.25 1.25zm-8-3c-.707 0-1.25.543-1.25 1.25s.543 1.25 1.25 1.25 1.25-.543 1.25-1.25-.543-1.25-1.25-1.25zm5 4.5c.915 0 1.66-.745 1.66-1.66s-.745-1.66-1.66-1.66-1.66.745-1.66 1.66.745 1.66 1.66 1.66zm0-1c.368 0 .667-.299.667-.667s-.299-.667-.667-.667-.667.299-.667.667.299.667.667.667zM12 4.5c-3.13 0-5.66 2.53-5.66 5.66s2.53 5.66 5.66 5.66 5.66-2.53 5.66-5.66-2.53-5.66-5.66-5.66z"/></svg>
                    </a>
                </div>
            </div>
        </div>

        <!-- Animated Graphic Section (Simulates the visual style) -->
        <div class="flex-1 flex justify-center items-center relative">
            <div class="w-64 h-64 sm:w-80 sm:h-80 lg:w-96 lg:h-96 rounded-full bg-indigo-500 bg-opacity-30 flex items-center justify-center animate-float">
                <div class="w-48 h-48 sm:w-64 sm:h-64 rounded-full bg-indigo-400 bg-opacity-50 border-4 border-yellow-300 flex items-center justify-center animate-float">
                    <span class="text-5xl sm:text-7xl lg:text-8xl font-black text-white transform -rotate-12">Q</span>
                </div>
            </div>
            <!-- Floating icons -->
            <div class="absolute top-1/4 left-1/4 transform -translate-x-1/2 -translate-y-1/2 text-5xl opacity-80">
                <span class="animate-float">💡</span>
            </div>
            <div class="absolute bottom-1/4 right-1/4 transform translate-x-1/2 translate-y-1/2 text-5xl opacity-80">
                <span class="animate-float">🧠</span>
            </div>
        </div>
    </main>