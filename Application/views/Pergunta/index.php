
    <style>
        /* Estilos personalizados simples para alinhar o texto dentro da tabela */
        .table-cell-v-middle {
            vertical-align: middle;
        }
    </style>
<body class="bg-gray-50">

<div class="container mx-auto px-4 py-10">
    <div class="flex justify-center">
        <div class="w-full max-w-xl">
            <div class="bg-white shadow-xl rounded-lg mb-8">
                <div class="p-4 bg-indigo-600 rounded-t-lg">
                    <h4 class="text-xl font-bold text-white">Cadastrar Pergunta 📝</h4>
                </div>
                <div class="p-6">
                    <form action="/pergunta/salvar/" method="POST">
                        
                        <div class="mb-4">
                            <label for="id_categoria" class="block text-sm font-medium text-gray-700 mb-1">Categoria</label>
                            <select class="block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm text-black" id="id_categoria" name="txt_categoria" required>
                                <option value="" disabled selected>Selecione uma categoria</option>
                                <?php foreach ($data['categorias'] as $categoria): ?>
                                <option value="<?= $categoria['id'] ?>"><?= $categoria['nome'] ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                        
                        <div class="mb-6">
                            <label for="pergunta" class="block text-sm font-medium text-gray-700 mb-1">Pergunta</label>
                            <input type="text" class="w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 text-black" id="pergunta" name="txt_pergunta" placeholder="Digite a pergunta" required>
                        </div>
                        
                        <button type="submit" class="w-full flex justify-center py-2 px-4 border border-transparent rounded-md shadow-sm text-sm font-medium text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 transition duration-150 ease-in-out">
                            Cadastrar
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <h3 class="text-2xl font-semibold text-center mt-10 mb-6 text-gray-600">Perguntas Cadastradas 🔍</h3>
    <div class="flex justify-center">
        <div class="w-full max-w-6xl">
            <div class="bg-white shadow-xl rounded-lg overflow-hidden">
                <div class="overflow-x-auto">
                    <table class="min-w-full divide-y divide-gray-200">
                        <thead class="bg-indigo-600">
                            <tr>
                                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-white uppercase tracking-wider w-1/12">ID</th>
                                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-white uppercase tracking-wider w-2/12">Categoria</th>
                                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-white uppercase tracking-wider w-7/12">Pergunta</th>
                                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-white uppercase tracking-wider w-2/12">Ações</th>
                            </tr>
                        </thead>
                        <tbody class="bg-white divide-y divide-gray-200">
                            <?php foreach ($data['perguntas'] as $pergunta): ?>
                            <tr class="hover:bg-gray-50">
                                <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900 table-cell-v-middle"><?= $pergunta['id'] ?></td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-600 table-cell-v-middle"><?= $pergunta['nome'] ?></td>
                                <td class="px-6 py-4 whitespace-normal text-sm text-gray-900 table-cell-v-middle"><?= $pergunta['pergunta'] ?></td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm font-medium table-cell-v-middle">
                                    <a href="/pergunta/excluir/<?=$pergunta['id']?>" class="text-red-600 hover:text-red-900 font-medium border border-red-600 hover:border-red-900 py-1 px-3 rounded-full transition duration-150 ease-in-out">
                                        Excluir
                                    </a>
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
