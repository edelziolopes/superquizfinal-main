<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro de Respostas (Tailwind CSS)</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        /* Estilos personalizados simples para alinhar o texto dentro da tabela */
        .table-cell-v-middle {
            vertical-align: middle;
        }
    </style>
</head>
<body class="bg-gray-50">


<div class="container mx-auto px-4 py-10">
    <div class="flex justify-center">
        <div class="w-full max-w-lg">
            <div class="bg-white shadow-xl rounded-lg mb-8">
                <div class="p-6">
                    <h4 class="text-xl font-bold mb-6 text-center text-indigo-600">Cadastro de Respostas 🧠</h4>
                    
                    <form action="/resposta/salvar/" method="POST">
                        
                        <div class="mb-4">
                            <label for="id_pergunta" class="block text-sm font-medium text-gray-700 mb-1">Pergunta</label>
                            <select class="block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm text-black" id="id_pergunta" name="txt_pergunta" required>
                                <option value="" disabled selected>Escolha uma pergunta</option>
                                <?php foreach ($data['perguntas'] as $pergunta): ?>
                                <option value="<?= $pergunta['id'] ?>"><?= $pergunta['pergunta'] ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>

                        <div class="mb-4">
                            <label class="block text-sm font-medium text-gray-700 mb-1">Alternativas</label>
                            <input type="text" class="w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 mb-2 text-black" name="alternativa_a" placeholder="Alternativa A" required>
                            <input type="text" class="w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 mb-2 text-black" name="alternativa_b" placeholder="Alternativa B" required>
                            <input type="text" class="w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 mb-2 text-black" name="alternativa_c" placeholder="Alternativa C" required>
                            <input type="text" class="w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 text-black" name="alternativa_d" placeholder="Alternativa D" required>
                        </div>

                        <div class="mb-6">
                            <label for="resposta" class="block text-sm font-medium text-gray-700 mb-1">Resposta Correta</label>
                            <select class="block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm text-black" id="resposta" name="resposta" required>
                                <option value="" selected disabled>Selecione a alternativa correta</option>
                                <option value="A">Alternativa A</option>
                                <option value="B">Alternativa B</option>
                                <option value="C">Alternativa C</option>
                                <option value="D">Alternativa D</option>
                            </select>
                        </div>
                        
                        <button type="submit" class="w-full flex justify-center py-2 px-4 border border-transparent rounded-md shadow-sm text-sm font-medium text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 transition duration-150 ease-in-out">
                            Cadastrar Resposta
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <h3 class="text-2xl font-semibold text-center mt-10 mb-6 text-gray-600">Respostas Cadastradas 📊</h3>
    <div class="flex justify-center">
        <div class="w-full max-w-6xl">
            <div class="bg-white shadow-xl rounded-lg overflow-hidden">
                <div class="overflow-x-auto">
                    <table class="min-w-full divide-y divide-gray-200">
                        <thead class="bg-indigo-600">
                            <tr>
                                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-white uppercase tracking-wider w-1/12">ID</th>
                                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-white uppercase tracking-wider w-3/12">Pergunta</th>
                                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-white uppercase tracking-wider w-5/12">Alternativas</th>
                                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-white uppercase tracking-wider w-1/12">Resposta</th>
                                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-white uppercase tracking-wider w-2/12">Ações</th>
                            </tr>
                        </thead>
                        <tbody class="bg-white divide-y divide-gray-200">
                            <?php foreach ($data['respostas'] as $resposta): ?>
                            <tr class="hover:bg-gray-50">
                                <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900 table-cell-v-middle"><?= $resposta['id'] ?></td>
                                <td class="px-6 py-4 whitespace-normal text-sm text-gray-600 table-cell-v-middle"><?= $resposta['pergunta'] ?></td>
                                <td class="px-6 py-4 whitespace-normal text-sm text-gray-600">
                                    <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-gray-100 text-gray-800 mr-1">A</span> <?= $resposta['alternativa_a'] ?><br>
                                    <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-gray-100 text-gray-800 mr-1">B</span> <?= $resposta['alternativa_b'] ?><br>
                                    <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-gray-100 text-gray-800 mr-1">C</span> <?= $resposta['alternativa_c'] ?><br>
                                    <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-gray-100 text-gray-800 mr-1">D</span> <?= $resposta['alternativa_d'] ?>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm font-medium table-cell-v-middle">
                                    <span class="px-3 py-1 inline-flex text-xs leading-5 font-semibold rounded-full bg-green-100 text-green-800">
                                        <?= $resposta['resposta'] ?>
                                    </span>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm font-medium table-cell-v-middle">
                                    <a href="/resposta/excluir/<?=$resposta['id']?>" class="text-red-600 hover:text-red-900 font-medium border border-red-600 hover:border-red-900 py-1 px-3 rounded-full transition duration-150 ease-in-out">Excluir</a>
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



</body>
</html>