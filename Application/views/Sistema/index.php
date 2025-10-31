    <style>
        /* Estilo para a animação de fade-in/out */
        .quiz-question {
            transition: opacity 0.5s ease-in-out;
        }
    </style>

    <div class="bg-white rounded-2xl shadow-xl p-8 w-full max-w-3xl">

        <div id="quiz-header" class="mb-6 border-b pb-4">
            <h1 class="text-3xl font-bold text-gray-800 text-center">Quizz de Conhecimentos</h1>
            <p class="text-center text-gray-500 mt-2">Pergunta <span id="current-question-number">1</span> de <?php echo count($data['perguntas']); ?></p>
        </div>

        <div id="questions-container">
            <?php foreach ($data['perguntas'] as $index => $pergunta): ?>
                <div id="question-<?php echo $index; ?>" class="quiz-question hidden opacity-0">
                    <h2 class="text-2xl font-semibold text-gray-700 mb-8 text-center">
                        <?php echo htmlspecialchars($pergunta['Pergunta']); ?>
                    </h2>
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                        <button class="answer-button bg-blue-500 hover:bg-blue-600 text-white font-bold py-4 px-6 rounded-lg transition duration-300 transform hover:scale-105" data-answer="A" data-next-index="<?php echo $index + 1; ?>">
                            <?php echo htmlspecialchars($pergunta['RespA']); ?>
                        </button>
                        <button class="answer-button bg-blue-500 hover:bg-blue-600 text-white font-bold py-4 px-6 rounded-lg transition duration-300 transform hover:scale-105" data-answer="B" data-next-index="<?php echo $index + 1; ?>">
                            <?php echo htmlspecialchars($pergunta['RespB']); ?>
                        </button>
                        <button class="answer-button bg-blue-500 hover:bg-blue-600 text-white font-bold py-4 px-6 rounded-lg transition duration-300 transform hover:scale-105" data-answer="C" data-next-index="<?php echo $index + 1; ?>">
                            <?php echo htmlspecialchars($pergunta['RespC']); ?>
                        </button>
                        <button class="answer-button bg-blue-500 hover:bg-blue-600 text-white font-bold py-4 px-6 rounded-lg transition duration-300 transform hover:scale-105" data-answer="D" data-next-index="<?php echo $index + 1; ?>">
                            <?php echo htmlspecialchars($pergunta['RespD']); ?>
                        </button>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>

        <div id="quiz-end-screen" class="hidden text-center">
            <h2 class="text-3xl font-bold text-green-500">Parabéns!</h2>
            <p class="text-gray-600 text-xl mt-4">
                Você acertou <span id="final-score" class="font-bold">0</span> de <span id="total-questions" class="font-bold">0</span> perguntas.
            </p>
                <button onclick="window.location.href = '/ranking/salvar/24/30';" class="mt-8 bg-indigo-600 hover:bg-indigo-700 text-white font-bold py-3 px-8 rounded-lg transition duration-300">
                    Perfil
                </button>   
        </div>

    </div>

    <script>
        // Transfere as respostas corretas do PHP para o JavaScript de forma segura
        const correctAnswers = <?php echo json_encode(array_column($data['perguntas'], 'Correta')); ?>;

        document.addEventListener('DOMContentLoaded', () => {
            const questions = document.querySelectorAll('.quiz-question');
            const answerButtons = document.querySelectorAll('.answer-button');
            const totalQuestions = questions.length;
            const currentQuestionNumberSpan = document.getElementById('current-question-number');
            const quizEndScreen = document.getElementById('quiz-end-screen');
            const quizHeader = document.getElementById('quiz-header');
            const finalScoreSpan = document.getElementById('final-score');
            const totalQuestionsSpan = document.getElementById('total-questions');

            let currentQuestionIndex = 0;
            let score = 0;

            // Função para mostrar uma pergunta específica com animação
            function showQuestion(index) {
                questions.forEach((question) => {
                    question.classList.add('hidden', 'opacity-0');
                });

                const questionToShow = document.getElementById(`question-${index}`);
                if (questionToShow) {
                    questionToShow.classList.remove('hidden');
                    setTimeout(() => {
                        questionToShow.classList.remove('opacity-0');
                    }, 50);
                    currentQuestionNumberSpan.textContent = index + 1;
                }
            }
            
            // Adiciona o evento de clique para todos os botões de resposta
            answerButtons.forEach(button => {
                button.addEventListener('click', () => {
                    // 1. Verifica se a resposta está correta e atualiza a pontuação
                    const selectedAnswer = button.getAttribute('data-answer');
                    if (selectedAnswer === correctAnswers[currentQuestionIndex]) {
                        score++;
                    }

                    // 2. Animação e transição para a próxima pergunta
                    const currentQuestion = questions[currentQuestionIndex];
                    const nextIndex = parseInt(button.getAttribute('data-next-index'));
                    
                    currentQuestion.classList.add('opacity-0');

                    setTimeout(() => {
                        currentQuestion.classList.add('hidden');

                        if (nextIndex < totalQuestions) {
                            currentQuestionIndex = nextIndex;
                            showQuestion(currentQuestionIndex);
                        } else {
                            // Fim do quizz: exibe a tela final com a pontuação
                            quizHeader.classList.add('hidden');
                            finalScoreSpan.textContent = score;
                            totalQuestionsSpan.textContent = totalQuestions;
                            quizEndScreen.classList.remove('hidden');
                        }
                    }, 500); // Deve ser igual à duração da transição no CSS
                });
            });

            // Mostra a primeira pergunta ao carregar a página
            if (totalQuestions > 0) {
                showQuestion(0);
            }
        });
    </script>