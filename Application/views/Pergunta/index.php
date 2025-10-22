    <nav class="bg-gray-800 shadow-md">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex items-center justify-between h-16">
                <div class="flex items-center">
                    <span class="text-white font-bold text-xl">Admin</span>
                </div>
                <div class="hidden md:block">
                    <div class="ml-10 flex items-baseline space-x-4">
                        <a href="/categoria" class="text-gray-300 hover:bg-gray-700 hover:text-white px-3 py-2 rounded-md text-sm font-medium">Categorias</a>
                        <a href="/pergunta" class="bg-gray-900 text-white px-3 py-2 rounded-md text-sm font-medium" aria-current="page">Perguntas</a>
                        <a href="/resposta" class="text-gray-300 hover:bg-gray-700 hover:text-white px-3 py-2 rounded-md text-sm font-medium">Respostas</a>
                    </div>
                </div>
            </div>
        </div>
    </nav>

    <div class="max-w-7xl mx-auto py-10 px-4 sm:px-6 lg:px-8">
        
        <div class="max-w-2xl mx-auto">
            <div class="bg-white shadow-md rounded-lg">
                <div class="bg-indigo-600 p-4 rounded-t-lg">
                    <h2 class="text-2xl font-bold text-white">Cadastrar Pergunta</h2>
                </div>
                <div class="p-6">
                    <form action="/pergunta/salvar/" method="POST">
                        <div class="mb-4">
                            <label for="id_categoria" class="block text-sm font-medium text-gray-700 mb-1">Categoria</label>
                            <select id="id_categoria" name="txt_categoria" required class="w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500">
                                <option value="" disabled selected>Selecione uma categoria</option>
                                <?php foreach ($data['categorias'] as $categoria): ?>
                                    <option value="<?= $categoria['id'] ?>"><?= $categoria['nome'] ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                        
                        <div class="mb-6">
                            <label for="pergunta" class="block text-sm font-medium text-gray-700 mb-1">Pergunta</label>
                            <input type="text" id="pergunta" name="txt_pergunta" placeholder="Digite a pergunta" required class="w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500">
                        </div>

                        <button type="submit" class="w-full bg-indigo-600 text-white py-2 px-4 rounded-md hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 transition duration-300">
                            Cadastrar
                        </button>
                    </form>
                </div>
            </div>
        </div>

        <div class="mt-12 max-w-5xl mx-auto">
            <h3 class="text-2xl font-semibold text-gray-700 text-center mb-6">Perguntas Cadastradas</h3>
            
            <div class="bg-white shadow-md rounded-lg">
                 <div class="overflow-x-auto">
                    <table class="min-w-full divide-y divide-gray-200">
                        <thead class="bg-gray-50">
                            <tr>
                                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">ID</th>
                                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Categoria</th>
                                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Pergunta</th>
                                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Ações</th>
                            </tr>
                        </thead>
                        <tbody class="bg-white divide-y divide-gray-200">
                            <?php if (empty($data['perguntas'])): ?>
                                <tr>
                                    <td colspan="4" class="px-6 py-4 text-center text-gray-500">Nenhuma pergunta cadastrada.</td>
                                </tr>
                            <?php else: ?>
                                <?php foreach ($data['perguntas'] as $pergunta): ?>
                                    <tr class="hover:bg-gray-50">
                                        <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900"><?= $pergunta['id'] ?></td>
                                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-600"><?= $pergunta['nome'] ?></td>
                                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-600"><?= $pergunta['pergunta'] ?></td>
                                        <td class="px-6 py-4 whitespace-nowrap text-sm font-medium">
                                            <a href="/pergunta/excluir/<?=$pergunta['id']?>" class="inline-block bg-red-600 text-white px-3 py-1 rounded-md hover:bg-red-700 transition duration-300 text-xs">Excluir</a>
                                        </td>
                                    </tr>
                                <?php endforeach; ?>
                            <?php endif; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

    </div>