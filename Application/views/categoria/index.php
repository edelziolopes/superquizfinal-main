<div class="min-h-screen sm:p-8 container">

  <div class="max-w-4xl mx-auto">

    <div class="bg-white rounded-lg shadow-lg mb-8">
      <div class="bg-blue-600 text-white p-4 rounded-t-lg">
        <h4 class="text-xl font-bold">Cadastrar Categoria</h4>
      </div>
      <div class="p-6">
        <form action="/categoria/salvar" method="POST">
          <div class="mb-4">
            <label for="nome" class="block text-gray-700 font-semibold mb-2">Nome da Categoria</label>
            <input type="text" 
                   class="text-black w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500" 
                   id="nome" 
                   name="nome" 
                   placeholder="Ex: Matemática" 
                   required>
          </div>
          <button type="submit" 
                  class="bg-blue-600 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded-md transition duration-300">
            Cadastrar
          </button>
        </form>
      </div>
    </div>

    <div class="bg-white rounded-lg shadow-lg mt-8">
      <div class="bg-gray-800 text-white p-4 rounded-t-lg">
        <h4 class="text-xl font-bold">Categorias Cadastradas</h4>
      </div>
      <div class="p-6">
        <div class="overflow-x-auto">
          <table class="min-w-full text-left table-auto">
            <thead class="bg-gray-700 text-white">
              <tr>
                <th scope="col" class="px-4 py-2 uppercase font-semibold text-sm">ID</th>
                <th scope="col" class="px-4 py-2 uppercase font-semibold text-sm">Nome</th>
                <th scope="col" class="px-4 py-2 uppercase font-semibold text-sm">Ações</th>
              </tr>
            </thead>
            <tbody>
              <?php foreach ($data['categorias'] as $categoria): ?>
                <tr class="border-b border-gray-200 hover:bg-gray-100">
                  <th scope="row" class="px-4 py-2 font-medium text-gray-900"><?=$categoria['id']?></th>
                  <td class="px-4 py-2 text-black"><?=$categoria['nome']?></td>
                  <td class="px-4 py-2">
                    <a href="/categoria/excluir/<?=$categoria['id']?>" 
                       class="bg-red-600 hover:bg-red-700 text-white text-xs font-bold py-1 px-3 rounded-md transition duration-300">
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