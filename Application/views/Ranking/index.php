<style>
/* 🔑 SOLUÇÃO: Define a altura total e mínima para a rolagem */
html, body {
    /* Garante que o html e o body usem 100% da altura disponível */
    height: 100%; 
    /* Garante que o html tenha pelo menos 100% da altura da tela, permitindo a rolagem */
    min-height: 100vh;
}

body {
    font-family: 'Inter', sans-serif;
    /* Fundo gradiente em tela cheia */
    background: linear-gradient(135deg, #1f2937, #3b82f6);
    
    /* Ao definir height: 100% no html e body, o gradiente cobre toda a área rolada. */
    
    /* O texto do cabeçalho e títulos principais é branco */
    color: white; 
}

/* Esta regra garante que os elementos dentro dos cards transparentes herdem a cor escura definida neles, exceto os botões internos que têm sua própria cor */
.card-content > * {
    /* Corrigindo a cor dos elementos dentro dos cards (text-gray-900) */
    color: inherit; 
    /* Removido o !important pois o 'text-gray-900' já é a cor desejada do container. */
}
</style>

<body>
    <div class="container mx-auto max-w-6xl p-8">
        <header class="flex justify-between items-center mb-12">
            <div>
                <h1 class="text-3xl font-bold" id="user-greeting">Olá, <span class="text-yellow-300"><?=$_SESSION['usuario_logado']->nome?>!👋</span></h1>
             
            </div>
            
            
        </header>



        <?php
            $max_pontos = 3000;
            $user_pontos = 0;
            if (isset($data['rankings']) && isset($data['rankings'][0]['total_pontos'])) {
                $user_pontos = (int) $data['rankings'][0]['total_pontos']; }
            $percentual = 0;
            if ($max_pontos > 0) { 
                $percentual = ($user_pontos / $max_pontos) * 100; }
            $percentual_width = max(0, min($percentual, 100));
            $pontos_faltando = max(0, $max_pontos - $user_pontos);
        ?>

        <div class="p-8 rounded-3xl bg-white bg-opacity-20 backdrop-blur-md shadow-2xl border border-white border-opacity-30 text-center mb-8 text-gray-900 card-content">
            
            <h2 class="text-4xl font-bold mb-2" id="user-points">
                <?= $user_pontos ?> Pontos
            </h2>

            <p class="text-lg text-opacity-80 mb-6">Seu desempenho atual.</p>
            
            <div class="w-full bg-gray-300 rounded-full h-2.5">
                <div class="bg-blue-500 h-2.5 rounded-full" id="progress-bar" style="width: <?= $percentual_width ?>%;"></div>
            </div>
            
            <p class="text-xs text-opacity-80 mt-2" id="next-level-points">
                <?= $pontos_faltando ?> pontos para o nível máximo.
            </p>
        </div>




        <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-8">
            <div class="p-8 rounded-3xl bg-white bg-opacity-20 backdrop-blur-md shadow-2xl border border-white border-opacity-30 text-center flex flex-col items-center text-gray-900 card-content">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-12 w-12 text-yellow-500 mb-4" viewBox="0 0 24 24" fill="currentColor">
                    <path d="M12 2c-5.523 0-10 4.477-10 10s4.477 10 10 10 10-4.477 10-10S17.523 2 12 2zm0 2a8 8 0 100 16A8 8 0 0012 4zm-1 2h2v4h4v2h-4v4h-2v-4H6v-2h4V6zm-1 8h2v2h-2v-2zM12 6c-3.313 0-6 2.687-6 6v2c0 3.313 2.687 6 6 6s6-2.687 6-6v-2c0-3.313-2.687-6-6-6zm0 2a4 4 0 100 8A4 4 0 0012 8zm0 2a2 2 0 110 4 2 2 0 010-4z"/>
                    <path d="M12 11a1 1 0 100 2 1 1 0 000-2z"/>
                </svg>
                <h3 class="text-xl font-bold mb-2">Fazer Quiz</h3>
                <p class="text-sm text-opacity-80 mb-4">Responda perguntas e ganhe pontos!</p>
                <a href="/sorteio" class="w-full py-3 px-6 rounded-xl bg-yellow-400 text-blue-900 font-semibold transition-all duration-200 hover:bg-yellow-500">
                    Começar Quiz
                </a>
            </div>
            
            <div class="p-8 rounded-3xl bg-white bg-opacity-20 backdrop-blur-md shadow-2xl border border-white border-opacity-30 text-center flex flex-col items-center text-gray-900 card-content">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-12 w-12 text-yellow-500 mb-4" viewBox="0 0 24 24" fill="currentColor">
                    <path d="M12 2a10 10 0 0110 10c0 5.523-4.477 10-10 10S2 17.523 2 12A10 10 0 0112 2zm0 2a8 8 0 100 16A8 8 0 0012 4zm0 2a6 6 0 110 12A6 6 0 0012 6zm0 2a4 4 0 100 8A4 4 0 0012 8zm0 2a2 2 0 110 4 2 2 0 010-4z"/>
                    <path d="M12 6c-3.313 0-6 2.687-6 6h2c0-2.206 1.794-4 4-4v-2zm-6 6c0 3.313 2.687 6 6 6v-2c-2.206 0-4-1.794-4-4H6zm6 6c3.313 0 6-2.687 6-6h-2c0 2.206-1.794 4-4 4v2zm6-6c0-3.313-2.687-6-6-6v2c2.206 0 4 1.794 4 4h2z"/>
                    <path d="M12 11a1 1 0 100 2 1 1 0 000-2z"/>
                </svg>
                <h3 class="text-xl font-bold mb-2">Ranking Geral</h3>
                <p class="text-sm text-opacity-80 mb-4">Veja sua posição entre todos os alunos.</p>
                <a href="geral.php" class="w-full py-3 px-6 rounded-xl bg-purple-600 text-white font-semibold transition-all duration-200 hover:bg-purple-700">
                    Ver Ranking
                </a>
            </div>
            
            <div class="p-8 rounded-3xl bg-white bg-opacity-20 backdrop-blur-md shadow-2xl border border-white border-opacity-30 text-center flex flex-col items-center text-gray-900 card-content">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-12 w-12 text-purple-500 mb-4" viewBox="0 0 24 24" fill="currentColor">
                    <path d="M12 2C6.477 2 2 6.477 2 12s4.477 10 10 10 10-4.477 10-10S17.523 2 12 2zm-2 5a2 2 0 11-4 0 2 2 0 014 0zm0 4a2 2 0 11-4 0 2 2 0 014 0zM12 14c-1.657 0-3 1.343-3 3v3h6v-3c0-1.657-1.343-3-3-3z"/>
                </svg>
                <h3 class="text-xl font-bold mb-2">Ranking da Turma</h3>
                <p class="text-sm text-opacity-80 mb-4">Compare com seus colegas de turma.</p>
                <a href="turma.php" class="w-full py-3 px-6 rounded-xl bg-purple-600 text-white font-semibold transition-all duration-200 hover:bg-purple-700">
                    Ver Turma
                </a>
            </div>
        </div>
        <h2 class="text-2xl font-bold mb-4">Conquistas</h2>
        
        <div class="grid grid-cols-2 md:grid-cols-4 gap-6" id="achievements">
            
            <div class="p-6 rounded-3xl bg-white bg-opacity-20 backdrop-blur-md shadow-2xl border border-white border-opacity-30 text-center flex flex-col items-center text-gray-900 card-content">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-12 w-12 text-green-500 mb-2" viewBox="0 0 24 24" fill="currentColor">
                    <path d="M12 2a10 10 0 0110 10c0 5.523-4.477 10-10 10S2 17.523 2 12A10 10 0 0112 2zm0 2a8 8 0 100 16A8 8 0 0012 4zm0 2a6 6 0 110 12A6 6 0 0012 6zm0 2a4 4 0 100 8A4 4 0 0012 8zm0 2a2 2 0 110 4 2 2 0 010-4z"/>
                </svg>
                <p class="font-semibold text-lg">Primeiro Quiz</p>
                <p class="text-xs text-opacity-80">210 pontos</p>
            </div>
            <div class="p-6 rounded-3xl bg-white bg-opacity-20 backdrop-blur-md shadow-2xl border border-white border-opacity-30 text-center flex flex-col items-center text-gray-900 card-content">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-12 w-12 text-blue-500 mb-2" viewBox="0 0 24 24" fill="currentColor">
                    <path d="M12 2a10 10 0 0110 10c0 5.523-4.477 10-10 10S2 17.523 2 12A10 10 0 0112 2zm0 2a8 8 0 100 16A8 8 0 0012 4zm0 2a6 6 0 110 12A6 6 0 0012 6zm0 2a4 4 0 100 8A4 4 0 0012 8zm0 2a2 2 0 110 4 2 2 0 010-4z"/>
                    <path d="M12 6c-3.313 0-6 2.687-6 6h2c0-2.206 1.794-4 4-4v-2zm-6 6c0 3.313 2.687 6 6 6v-2c-2.206 0-4-1.794-4-4H6zm6 6c3.313 0 6-2.687 6-6h-2c0 2.206-1.794 4-4 4v2zm6-6c0-3.313-2.687-6-6-6v2c2.206 0 4 1.794 4 4h2z"/>
                    <path d="M12 11a1 1 0 100 2 1 1 0 000-2z"/>
                </svg>
                <p class="font-semibold text-lg">Estudioso</p>
                <p class="text-xs text-opacity-80">840 pontos</p>
            </div>
            <div class="p-6 rounded-3xl bg-white bg-opacity-20 backdrop-blur-md shadow-2xl border border-white border-opacity-30 text-center flex flex-col items-center text-gray-900 card-content">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-12 w-12 text-pink-500 mb-2" viewBox="0 0 24 24" fill="currentColor">
                    <path d="M12 2a10 10 0 0110 10c0 5.523-4.477 10-10 10S2 17.523 2 12A10 10 0 0112 2zm0 2a8 8 0 100 16A8 8 0 0012 4zm0 2a6 6 0 110 12A6 6 0 0012 6zm0 2a4 4 0 100 8A4 4 0 0012 8zm0 2a2 2 0 110 4 2 2 0 010-4z"/>
                    <path d="M12 11a1 1 0 100 2 1 1 0 000-2z"/>
                </svg>
                <p class="font-semibold text-lg">Expert</p>
                <p class="text-xs text-opacity-80">1460 pontos</p>
            </div>
            <div class="p-6 rounded-3xl bg-white bg-opacity-20 backdrop-blur-md shadow-2xl border border-white border-opacity-30 text-center flex flex-col items-center text-gray-900 card-content">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-12 w-12 text-yellow-500 mb-2" viewBox="0 0 24 24" fill="currentColor">
                    <path d="M12 2a10 10 0 0110 10c0 5.523-4.477 10-10 10S2 17.523 2 12A10 10 0 0112 2zm0 2a8 8 0 100 16A8 8 0 0012 4zm0 2a6 6 0 110 12A6 6 0 0012 6zm0 2a4 4 0 100 8A4 4 0 0012 8zm0 2a2 2 0 110 4 2 2 0 010-4z"/>
                </svg>
                <p class="font-semibold text-lg">Lenda</p>
                <p class="text-xs text-opacity-80">2730 pontos</p>
            </div>
        </div>
    </div>
</body>