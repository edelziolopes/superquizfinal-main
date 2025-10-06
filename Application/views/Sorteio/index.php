<style>
        

        .container {
            text-align: center;
            padding: 2.5rem;
            border-radius: 80px;
            box-shadow: 0 8px 16px rgba(0, 0, 0, 0.4);
            width: 90%;
            max-width: 500px;
        }



        .dice-container {
            display
            perspective: 1000px;
            margin-bottom: 2rem;
        }

        .dice {
            width: 250px;
            height: 250px;
            background-color: #4a90e2;
            border-radius: 45px;
            display: flex;
            justify-content: center;
            align-items: center;
            text-align: center;
            color: #fff;
            font-size: 2rem;
            font-weight: bold;
            cursor: pointer;
            margin: 0 auto;
            box-shadow: 0 10px 20px rgba(0, 0, 0, 0.3);
            transition: transform 0.5s ease-in-out, box-shadow 0.3s ease;
        }

        .dice:hover {
            transform: translateY(-8px) scale(1.03);
            box-shadow: 0 15px 30px rgba(0, 0, 0, 0.4);
        }

        .dice.rolling {
            animation: rolling-animation 1s infinite cubic-bezier(0.68, -0.55, 0.27, 1.55);
        }

        @keyframes rolling-animation {
            0% { transform: rotateY(0deg) rotateX(0deg); }
            100% { transform: rotateY(360deg) rotateX(360deg); }
        }

        .result {
            padding: 1.5rem;
            font-size: 1.8rem;
        }

        .action-button {
            background-color: #4a90e2;
            color: #fff;
            border: none;
            padding: 1rem 2rem;
            border-radius: 50px;
            font-size: 1.2rem;
            font-weight: bold;
            cursor: pointer;
            transition: background-color 0.3s, transform 0.2s;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
        }

        .action-button:hover {
            background-color: #3b7ad1;
            transform: translateY(-2px);
        }
</style>    
    
    <main class="container">
        <h1>Sorteio de Matérias</h1>
        <p>Clique no dado para sortear a matéria do seu quizz!</p>

        <div class="dice-container">
            <div id="dice" class="dice">
                <div id="result-text" class="result">Clique aqui!</div>
            </div>
        </div>

    </main>

    <script>
         // Array com as matérias disponíveis
        const materias = [
            "Sistemas",
            "Logística",
            "Eletrônica"
        ];

        // Elementos HTML
        const dice = document.getElementById('dice');
        const resultText = document.getElementById('result-text');

        // Função para sortear a matéria
        function sortearMateria() {
            dice.classList.add('rolling');
            resultText.textContent = "Sorteando...";

            setTimeout(() => {
                const indiceAleatorio = Math.floor(Math.random() * materias.length);
                const materiaSorteada = materias[indiceAleatorio];
                resultText.textContent = materiaSorteada;
                dice.classList.remove('rolling');
            }, 1200); // Aumentei o tempo para a animação ficar mais visível
        }

        // Adiciona o evento de clique ao dado
        dice.addEventListener('click', sortearMateria);
    </script>
