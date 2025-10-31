    <style>
        /* Importa a fonte Inter para o design moderno */
        @import url('https://fonts.googleapis.com/css2?family=Inter:wght@100..900&display=swap');


        /* Definição da Animação do Fundo */
        @keyframes gradientShift {
            0% { background-position: 0% 50%; }
            50% { background-position: 100% 50%; }
            100% { background-position: 0% 50%; }
        }

        /* Efeito Glassmorphism para o cartão principal */
        .glass-card {
            background: rgba(255, 255, 255, 0.2); /* Branco semi-transparente */
            backdrop-filter: blur(15px); /* Efeito de vidro fosco */
            -webkit-backdrop-filter: blur(15px);
            border: 1px solid rgba(255, 255, 255, 0.3); /* Borda sutil */
            box-shadow: 0 10px 40px 0 rgba(31, 38, 135, 0.37); /* Sombra mais intensa */
            transition: all 0.5s cubic-bezier(0.25, 0.8, 0.25, 1);
        }

        /* Efeito sutil ao passar o mouse */
        .glass-card:hover {
            box-shadow: 0 15px 50px 0 rgba(31, 38, 135, 0.45);
            transform: translateY(-2px);
        }

        /* Estilo para a aba ativa - Roxo para Cadastrar, Amarelo/Laranja para Entrar */
        .tab-active-login {
            background-color: #f59e0b; /* Amarelo/Laranja vibrante (yellow-500) */
            color: white;
            font-weight: 600;
        }
        .tab-active-register {
            background-color: #9333ea; /* Roxo vibrante (purple-600) */
            color: white;
            font-weight: 600;
        }
    </style>
</head>
<body class="p-4">

    <div class="max-w-md w-full mx-auto p-6 flex flex-col items-center">
        <div class="text-center mb-8">
            <span class="text-6xl" role="img" aria-label="Troféu">🏆</span>
            <h1 class="text-3xl font-extrabold text-white mt-2 drop-shadow-lg">Ranking Escolar</h1>
            <p class="text-white text-sm mt-1 drop-shadow-md opacity-90">Compita, aprenda e conquiste o topo!</p>
        </div>

        <div class="glass-card w-full rounded-2xl p-6 md:p-8">
            <h2 class="text-xl font-semibold text-white mb-4">Bem-vindo!</h2>
            <p class="text-white opacity-70 mb-6 text-sm">Entre na sua conta ou crie uma nova.</p>

            <div class="flex bg-white/30 p-1 rounded-xl mb-6 shadow-inner">
                <button id="tab-login" class="flex-1 py-2 px-4 text-sm text-white rounded-lg transition-all tab-active-login shadow-md">
                    Entrar
                </button>
                <button id="tab-register" class="flex-1 py-2 px-4 text-sm text-white rounded-lg transition-all hover:bg-white/10">
                    Cadastrar
                </button>
            </div>

            <div id="form-container">
                </div>
        </div>
    </div>

    <script>
        const formContainer = document.getElementById('form-container');
        const tabLogin = document.getElementById('tab-login');
        const tabRegister = document.getElementById('tab-register');

        // --- Modelos de Formulários (Action e Name atualizados) ---

        const loginFormHTML = `
            <form id="login-form" method="POST" action="/usuario/entrar">
                
                <div class="mb-5">
                    <label for="login-nome" class="block text-sm font-medium text-white mb-2">Nome de Usuário</label>
                    <input type="text" id="login-nome" name="nome_usuario" placeholder="Digite seu nome" required
                            class="w-full p-3 rounded-xl border border-white/50 bg-white/20 text-white placeholder-white/70 
                                            focus:outline-none focus:ring-2 focus:ring-orange-400/80 transition-shadow duration-300 shadow-lg"
                            onfocus="handleFocus(this)" onblur="handleBlur(this)">
                </div>

                <div class="mb-8">
                    <label for="login-senha" class="block text-sm font-medium text-white mb-2">Senha</label>
                    <input type="password" id="login-senha" name="senha" placeholder="Digite sua senha" required
                            class="w-full p-3 rounded-xl border border-white/50 bg-white/20 text-white placeholder-white/70 
                                            focus:outline-none focus:ring-2 focus:ring-orange-400/80 transition-shadow duration-300 shadow-lg"
                            onfocus="handleFocus(this)" onblur="handleBlur(this)">
                </div>
                <?php if (isset($data['erro'])): ?><div class="alert alert-danger"><?= htmlspecialchars($data['erro']) ?></div><?php endif; ?>
                <button type="submit"
                        class="w-full py-3 bg-yellow-500 text-white font-bold rounded-xl shadow-lg hover:bg-yellow-600 
                                transition-all duration-300 transform hover:scale-[1.01] active:scale-95 
                                focus:outline-none focus:ring-4 focus:ring-yellow-400/70">
                    Entrar
                </button>
            </form>
        `;

        const registerFormHTML = `
            <form id="register-form" method="POST" action="/usuario/salvar/fe">
                
                <div class="mb-5">
                    <label for="register-nome" class="block text-sm font-medium text-white mb-2">Nome Completo</label>
                    <input type="text" id="register-nome" name="nome" placeholder="Digite seu nome completo" required
                            class="w-full p-3 rounded-xl border border-white/50 bg-white/20 text-white placeholder-white/70 
                                            focus:outline-none focus:ring-2 focus:ring-purple-400/80 transition-shadow duration-300 shadow-lg"
                            onfocus="handleFocus(this)" onblur="handleBlur(this)">
                </div>

                <div class="mb-5 relative">
                    <label for="register-turma" class="block text-sm font-medium text-white mb-2">Turma</label>
                    <select id="register-turma" name="turma" required
                            class="w-full p-3 rounded-xl border border-white/50 bg-white/20 text-white 
                                            focus:outline-none focus:ring-2 focus:ring-purple-400/80 transition-shadow duration-300 shadow-lg 
                                            appearance-none cursor-pointer"
                            onfocus="handleFocus(this)" onblur="handleBlur(this)">
                        <option value="" disabled selected class="bg-gray-800 text-white">Selecione sua turma...</option>

                        <option value="9EF" class="bg-gray-800 text-white">9º Ano do Ensino Fundamental</option>
                        
                        <option value="1S" class="bg-gray-800 text-white">1º Ano Desenvolvimento de Sistemas</option>
                        <option value="2S" class="bg-gray-800 text-white">2º Ano Desenvolvimento de Sistemas</option>
                        <option value="3S" class="bg-gray-800 text-white">3º Ano Desenvolvimento de Sistemas</option>
                        
                        <option value="1E" class="bg-gray-800 text-white">1º Ano Eletrônica</option>
                        <option value="2E" class="bg-gray-800 text-white">2º Ano Eletrônica</option>
                        <option value="3E" class="bg-gray-800 text-white">3º Ano Eletrônica</option>

                        <option value="1L" class="bg-gray-800 text-white">1º Ano Logistíca</option>
                        <option value="2L" class="bg-gray-800 text-white">2º Ano Logistíca</option>

                        <option value="1P" class="bg-gray-800 text-white">1º Ano Propedêutica</option>
                        <option value="2P" class="bg-gray-800 text-white">2º Ano Propedêutica</option>
                        <option value="3P" class="bg-gray-800 text-white">3º Ano Propedêutica</option>
                        
                        <option value="Professores" class="bg-gray-800 text-white">Professores</option>
                        <option value="Outros" class="bg-gray-800 text-white">Visitantes</option>
                    </select>
                    <div class="pointer-events-none absolute inset-y-0 right-0 top-9 flex items-center px-2 text-white">
                        <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M9.293 12.95l.707.707L15.657 8l-1.414-1.414L10 10.828 5.757 6.586 4.343 8z"/></svg>
                    </div>
                </div>

                <div class="mb-8">
                    <label for="register-senha" class="block text-sm font-medium text-white mb-2">Senha</label>
                    <input type="password" id="register-senha" name="senha" placeholder="Crie uma senha" required minlength="6"
                            class="w-full p-3 rounded-xl border border-white/50 bg-white/20 text-white placeholder-white/70 
                                            focus:outline-none focus:ring-2 focus:ring-purple-400/80 transition-shadow duration-300 shadow-lg"
                            onfocus="handleFocus(this)" onblur="handleBlur(this)">
                </div>

                <button type="submit"
                        class="w-full py-3 bg-purple-600 text-white font-bold rounded-xl shadow-lg hover:bg-purple-700 
                                transition-all duration-300 transform hover:scale-[1.01] active:scale-95 
                                focus:outline-none focus:ring-4 focus:ring-purple-400/70">
                    Criar Conta
                </button>
            </form>
        `;

        // --- Funções de Interação Visual ---

        // Função para adicionar um efeito de "elevado" no foco do input/select
        function handleFocus(input) {
            input.classList.add('shadow-xl', 'scale-[1.02]');
            input.classList.remove('shadow-lg', 'scale-100');
        }

        // Função para remover o efeito de "elevado" ao perder o foco
        function handleBlur(input) {
            input.classList.add('shadow-lg', 'scale-100');
            input.classList.remove('shadow-xl', 'scale-[1.02]');
        }

        // Função principal para trocar as abas
        function switchTab(target) {
            // Garante que o container do formulário esteja visível
            formContainer.style = '';

            if (target === 'login') {
                tabLogin.classList.add('tab-active-login', 'shadow-md');
                tabLogin.classList.remove('hover:bg-white/10');
                tabRegister.classList.remove('tab-active-register', 'shadow-md');
                tabRegister.classList.add('hover:bg-white/10');
                
                // Troca o conteúdo para o formulário de Login
                formContainer.innerHTML = loginFormHTML;
            } else { // target === 'register'
                tabRegister.classList.add('tab-active-register', 'shadow-md');
                tabRegister.classList.remove('hover:bg-white/10');
                tabLogin.classList.remove('tab-active-login', 'shadow-md');
                tabLogin.classList.add('hover:bg-white/10');

                // Troca o conteúdo para o formulário de Cadastro
                formContainer.innerHTML = registerFormHTML;
            }
        }
        
        // --- Event Listeners e Inicialização ---
        
        tabLogin.addEventListener('click', () => switchTab('login'));
        tabRegister.addEventListener('click', () => switchTab('register'));

        // ALTERAÇÃO 2: Define o estado inicial como 'login'
        switchTab('login'); 
    </script>