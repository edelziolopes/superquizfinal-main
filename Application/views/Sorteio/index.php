<style>
    /* Animação de rotação e escala para o dado */
    @keyframes roll {
        0% { transform: rotate(0deg) scale(0.8); }
        20% { transform: rotate(720deg) scale(1.2); }
        40% { transform: rotate(1440deg) scale(1); }
        60% { transform: rotate(2160deg) scale(1.1); }
        80% { transform: rotate(2880deg) scale(1); }
        100% { transform: rotate(3600deg) scale(1); }
    }
    .animate-roll {
        animation: roll 2s ease-out forwards;
    }

    /* Animação para o resultado aparecer suavemente */
    @keyframes fadeIn {
        from { opacity: 0; transform: translateY(-10px); }
        to { opacity: 1; transform: translateY(0); }
    }
    .fade-in {
        animation: fadeIn 0.5s ease-out forwards;
    }
</style>
<div class="text-center p-8 bg-gray-800 rounded-2xl shadow-2xl max-w-md mx-auto w-full">
    <h1 class="text-4xl font-bold mb-4 text-cyan-400">Sorteio de Matérias</h1>
    <p class="text-gray-400 mb-8">Clique no botão para descobrir sua próxima missão de estudos!</p>

    <div id="dice-container" class="mb-8 flex justify-center">
        <div id="dice" class="w-32 h-32 bg-gray-700 rounded-lg flex items-center justify-center text-6xl font-bold text-cyan-400 shadow-lg relative overflow-hidden">
            <span id="question-mark">?</span>
            <svg id="study-icon" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-20 h-20 hidden">
                <path stroke-linecap="round" stroke-linejoin="round" d="M12 6.042A8.967 8.967 0 006 3.75c-1.052 0-2.062.18-3 .512v14.25A8.987 8.987 0 016 18c2.305 0 4.408.867 6 2.292m0-14.25a8.966 8.966 0 016-2.292c1.052 0 2.062.18 3 .512v14.25A8.987 8.987 0 0018 18a8.967 8.967 0 00-6 2.292m0-14.25v14.25" />
            </svg>
        </div>
    </div>

    <div id="result" class="text-3xl font-bold my-6 h-10"></div>

    <button id="roll-button" class="bg-cyan-500 hover:bg-cyan-600 text-white font-bold py-3 px-8 rounded-full transition-all duration-300 ease-in-out transform hover:scale-105 shadow-lg">
        Sortear
    </button>
</div>

<script>
    // --- MUDANÇA PRINCIPAL AQUI ---
    // Array de objetos, cada um com nome para exibição e link para redirecionamento
    const materias = [
        { nome: 'Sistemas', link: '/sistema' },
        { nome: 'Eletrônica', link: '/eletronica' },
        { nome: 'Logística', link: '/logistica' }
    ];

    const rollButton = document.getElementById('roll-button');
    const dice = document.getElementById('dice');
    const questionMark = document.getElementById('question-mark');
    const studyIcon = document.getElementById('study-icon');
    const resultDiv = document.getElementById('result');

    rollButton.addEventListener('click', () => {
        // 1. Reseta o estado inicial e desabilita o botão
        rollButton.disabled = true;
        rollButton.classList.add('opacity-50', 'cursor-not-allowed');
        
        resultDiv.textContent = '';
        resultDiv.classList.remove('fade-in');
        
        studyIcon.classList.add('hidden');
        questionMark.classList.remove('hidden');
        
        // 2. Inicia a animação de rolagem
        dice.classList.add('animate-roll');

        // 3. Define o que acontece após a animação
        setTimeout(() => {
            const randomIndex = Math.floor(Math.random() * materias.length);
            const sortedMateria = materias[randomIndex]; // Agora é um objeto {nome: '...', link: '...'}

            // 4. Mostra o resultado usando a propriedade 'nome'
            dice.classList.remove('animate-roll');
            questionMark.classList.add('hidden');
            studyIcon.classList.remove('hidden');
            
            resultDiv.textContent = sortedMateria.nome; // Usa a propriedade 'nome'
            resultDiv.classList.add('fade-in');

            // 5. Redireciona usando a propriedade 'link'
            setTimeout(() => {
                window.location.href = sortedMateria.link; // Usa a propriedade 'link'
            }, 2000); 

        }, 2000); 
    });
</script>