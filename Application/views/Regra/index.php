<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Informações do Quiz</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Inter:wght@400;600;700&display=swap');
        body {
            font-family: 'Inter', sans-serif;
            background-color: #f3f4f6;
        }
    </style>
</head>

<body class="bg-slate-900 flex items-center justify-center min-h-screen p-4">
<div class="container bg-white rounded-xl shadow-lg p-6 md:p-10 max-w-2xl w-full border border-slate-700">
        <header class="text-center mb-8">
            <div class="flex items-center justify-center mb-2">
                <h1 class="text-4xl font-bold text-gray-800">Informações do Quiz</h1>
            </div>
            <p class="text-gray-500 text-lg">Leia as regras antes de começar!</p>
        </header>

        <section class="space-y-6">
            <!-- Seção de Visão Geral -->
            <div class="bg-blue-50 p-6 rounded-lg border border-blue-200">
                <h2 class="text-2xl font-semibold text-blue-700 mb-2 flex items-center">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 mr-2 text-blue-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                    </svg>
                    Visão Geral
                </h2>
                <p class="text-gray-700 leading-relaxed">
                    Este quiz desafiará seu conhecimento sobre diversos tópicos. Tente responder o mais rápido possível para acumular mais pontos!
                </p>
            </div>

            <!-- Seção de Regras -->
            <div class="bg-gray-50 p-6 rounded-lg border border-gray-200">
                <h2 class="text-2xl font-semibold text-gray-700 mb-4 flex items-center">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 mr-2 text-gray-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.108a9 9 0 11-12.728 0m12.728 0A9 9 0 007.382 17.382M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                    </svg>
                    Regras do Jogo
                </h2>
                <ul class="list-disc list-inside space-y-3 text-gray-700">
                    <li>
                        <strong>Perguntas Múltipla Escolha:</strong> Cada pergunta tem quatro opções. Apenas uma está correta.
                    </li>
                    <li>
                        <strong>Pontuação:</strong> Você ganha pontos por cada resposta correta. Respostas incorretas não resultam em perda de pontos.
                    </li>
                    <li>
                        <strong>Não Recarregar:</strong> Não recarregue a página durante o quiz, pois isso reiniciará seu progresso.
                    </li>
                    <li>
                        <strong>Login:</strong> Para prosseguir, é requerido que o usuário realize o procedimento de login e preencha os campos de nome completo e turma correspondente. 
                        Informa-se que apenas um cadastro é permitido por indivíduo.
                    </li>
                    <li>
                        <strong>Prêmios:</strong> O brinde surpresa será concedido aos primeiro, segundo e terceiro colocados. Não serão aceitos cadastros múltiplos com o mesmo nome para a obtenção do prêmio.


                    </li>
                    <li>
                        <strong>Concentração:</strong> Mantenha o foco! O objetivo é acertar o máximo de perguntas possível para alcançar uma pontuação alta.
                    </li>
                </ul>
            </div>

            <!-- Botão de Iniciar -->
            <div class="text-center mt-8">
                <a href="/home" class="inline-block bg-green-500 hover:bg-green-600 text-white font-bold py-3 px-8 rounded-lg transition-colors duration-300 shadow-md">
                ← Voltar
                </a>
            </div>
        </section>
    </div>
</body>