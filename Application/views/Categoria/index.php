
    <style>
        /* Estilo para garantir alinhamento vertical das células (melhor visual) */
        .table-cell-v-middle {
            vertical-align: middle;
        }

        /* Estilo para esconder o modal por padrão, será controlado pelo JS */
        .modal {
            display: none;
            opacity: 0;
            transition: opacity 0.3s ease-out;
        }
        .modal.open {
            display: flex;
            opacity: 1;
        }
    </style>
</head>
<body class="bg-gray-50">


<div class="container mx-auto px-4 py-10">
    <div class="flex justify-center">
        <div class="w-full max-w-2xl"> 
            
            <div class="bg-white shadow-xl rounded-lg mb-8">
                <div class="bg-indigo-600 text-white p-4 rounded-t-lg">
                    <h4 class="text-xl font-semibold">Cadastrar Categoria 📝</h4>
                </div>
                <div class="p-6">
                    <form action="/categoria/salvar" method="POST">
                        <div class="mb-4">
                            <label for="nome" class="block text-sm font-medium text-gray-700 mb-1">Nome da Categoria</label>
                            <input 
                                type="text" 
                                class="w-full px-4 py-2 border border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 text-black" 
                                id="nome" 
                                name="nome" 
                                placeholder="Ex: Matemática" 
                                required
                            >
                        </div>
                        <button type="submit" class="w-full bg-indigo-600 hover:bg-indigo-700 text-white font-medium py-2 px-4 rounded-md shadow-sm transition duration-150 ease-in-out">
                            Cadastrar
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <h3 class="text-2xl font-semibold text-center mt-10 mb-6 text-gray-600">Categorias Cadastradas 📋</h3>
    <div class="flex justify-center">
        <div class="w-full max-w-4xl">
            <div class="bg-white shadow-xl rounded-lg overflow-hidden">
                <div class="overflow-x-auto">
                    <table class="min-w-full divide-y divide-gray-200">
                        <thead class="bg-gray-700">
                            <tr>
                                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-white uppercase tracking-wider w-1/12">ID</th>
                                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-white uppercase tracking-wider w-7/12">Nome</th>
                                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-white uppercase tracking-wider w-2/12">Ações</th>
                            </tr>
                        </thead>
                        <tbody class="bg-white divide-y divide-gray-200">
                                <?php foreach ($data['categorias'] as $categoria): ?>
                            <tr class="hover:bg-gray-50">
                                <th scope="row" class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900 categoria-id table-cell-v-middle"><?= $categoria['id'] ?></th>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-800 categoria-nome table-cell-v-middle"><?= $categoria['nome'] ?></td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm font-medium table-cell-v-middle">
                                    <a href="/categoria/excluir/<?=$categoria['id']?>" 
                                       class="text-red-600 hover:text-red-900 font-medium border border-red-600 hover:border-red-900 py-1 px-3 rounded-full transition duration-150 ease-in-out">
                                        Excluir
                                    </a>
                                    <button 
                                        type="button" 
                                        class="open-modal bg-yellow-500 hover:bg-yellow-600 text-gray-900 font-bold py-1 px-3 rounded-full ml-2 transition duration-150 ease-in-out"
                                        data-id="<?=$categoria['id']?>"
                                        data-nome="<?=$categoria['nome']?>"
                                    >
                                        Editar
                                    </button>
                                </td>
                            </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

<div id="editarCategoriaModal" class="modal fixed inset-0 z-50 overflow-y-auto bg-gray-900 bg-opacity-50 justify-center items-center">
    <div class="relative bg-white rounded-lg shadow-xl w-full max-w-md mx-auto my-12 transform transition-all duration-300 scale-95 modal-content-area">
        <form action="/categoria/atualizar" method="POST"> 
            
            <div class="bg-yellow-500 text-gray-900 p-4 flex justify-between items-center rounded-t-lg">
                <h5 class="text-xl font-semibold" id="editarCategoriaModalLabel">Editar Categoria ✏️</h5>
                <button type="button" class="text-gray-900 hover:text-gray-700 close-modal">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path></svg>
                </button>
            </div>

            <div class="p-6">
                <input type="hidden" name="id" id="modal-categoria-id">

                <div class="mb-4">
                    <label for="modal-categoria-nome" class="block text-sm font-medium text-gray-700 mb-1">Nome da Categoria</label>
                    <input type="text" class="w-full px-4 py-2 border border-gray-300 rounded-md shadow-sm focus:ring-yellow-500 focus:border-yellow-500 text-black" id="modal-categoria-nome" name="nome" required>
                </div>
                
                <div class="p-3 bg-blue-100 border border-blue-300 text-blue-800 rounded-md" role="alert">
                    Editando o ID: <strong id="modal-id-display"></strong>
                </div>

            </div>
            
            <div class="p-4 bg-gray-50 flex justify-end space-x-3 rounded-b-lg">
                <button type="button" class="px-4 py-2 bg-gray-500 hover:bg-gray-600 text-white font-medium rounded-md close-modal">Fechar</button>
                <button type="submit" class="px-4 py-2 bg-yellow-500 hover:bg-yellow-600 text-white font-medium rounded-md">Salvar Alterações</button>
            </div>
        </form>
    </div>
</div>


<script>
    document.addEventListener('DOMContentLoaded', function () {
        const modal = document.getElementById('editarCategoriaModal');
        const openButtons = document.querySelectorAll('.open-modal');
        const closeButtons = document.querySelectorAll('.close-modal');
        const modalIdInput = modal.querySelector('#modal-categoria-id');
        const modalNomeInput = modal.querySelector('#modal-categoria-nome');
        const modalIdDisplay = modal.querySelector('#modal-id-display');

        // Função para abrir o modal
        function openModal(id, nome) {
            modalIdInput.value = id;
            modalNomeInput.value = nome;
            modalIdDisplay.textContent = id;
            modal.classList.add('open');
            document.body.classList.add('overflow-hidden'); // Para evitar scroll no fundo
        }

        // Função para fechar o modal
        function closeModal() {
            modal.classList.remove('open');
            document.body.classList.remove('overflow-hidden');
        }

        // Adicionar eventos aos botões de abrir
        openButtons.forEach(button => {
            button.addEventListener('click', function() {
                const id = this.getAttribute('data-id');
                const nome = this.getAttribute('data-nome');
                openModal(id, nome);
            });
        });

        // Adicionar eventos aos botões de fechar
        closeButtons.forEach(button => {
            button.addEventListener('click', closeModal);
        });

        // Fechar o modal ao clicar fora do conteúdo (overlay)
        modal.addEventListener('click', function(e) {
            if (e.target === modal) {
                closeModal();
            }
        });
        
        // Fechar o modal com a tecla ESC
                document.addEventListener('keydown', (e) => {
                    if (e.key === 'Escape' && modal.classList.contains('open')) {
                        closeModal();
                    }
                });
            });
</script>

</body>
