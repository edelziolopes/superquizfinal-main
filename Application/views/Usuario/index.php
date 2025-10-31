
  <style>
    /* Alinhamento vertical central nas células da tabela */
    .table-cell-v-middle {
      vertical-align: middle;
    }
  </style>

<body class="bg-gray-50">

<div class="container mx-auto px-4 py-10">

  <!-- Formulário de Cadastro -->
  <div class="flex justify-center">
    <div class="w-full max-w-xl">
      <div class="bg-white shadow-xl rounded-lg mb-8">
        <div class="p-4 bg-indigo-600 rounded-t-lg">
          <h4 class="text-xl font-bold text-white">Cadastrar Usuário 👤</h4>
        </div>
        <div class="p-6">
          <form action="/usuario/salvar/" method="POST">

            <!-- Campo Nome -->
            <div class="mb-4">
              <label for="nome" class="block text-sm font-medium text-gray-700 mb-1">Nome</label>
              <input 
                type="text" 
                id="nome" 
                name="nome"
                placeholder="Digite o nome do usuário"
                required
                class="block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm 
                       focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 
                       sm:text-sm text-black"
              >
            </div>

            <!-- Campo Turma -->
            <div class="mb-6">
              <label for="turma" class="block text-sm font-medium text-gray-700 mb-1">Turma</label>
              <select 
                id="turma" 
                name="turma"
                required
                class="block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm 
                       focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 
                       sm:text-sm text-black"
              >
                <option value="" disabled selected>Selecione a turma</option>
                <option value="1° Sistemas">1° Sistemas</option>
                <option value="1° Eletrônica">1° Eletrônica</option>
                <option value="1° Logística">1° Logística</option>
                <option value="1° Propedêutica">1° Propedêutica</option>
                <option value="2° Sistemas">2° Sistemas</option>
                <option value="2° Eletrônica">2° Eletrônica</option>
                <option value="2° Logística">2° Logística</option>
                <option value="2° Propedêutica">2° Propedêutica</option>
                <option value="3° Sistemas">3° Sistemas</option>
                <option value="3° Eletrônica">3° Eletrônica</option>
                <option value="3° Logística">3° Logística</option>
                <option value="3° Propedêutica">3° Propedêutica</option>
                <option value="9° ano">9° ano</option>
                <option value="Professores">Professores</option>
                <option value="Visitante">Visitante</option>
              </select>
            </div>

            <!-- Botão -->
            <button 
              type="submit" 
              class="w-full flex justify-center py-2 px-4 border border-transparent 
                     rounded-md shadow-sm text-sm font-medium text-white 
                     bg-indigo-600 hover:bg-indigo-700 
                     focus:outline-none focus:ring-2 focus:ring-offset-2 
                     focus:ring-indigo-500 transition duration-150 ease-in-out"
            >
              Cadastrar
            </button>
          </form>
        </div>
      </div>
    </div>
  </div>

  <!-- Tabela de Usuários -->
  <h3 class="text-2xl font-semibold text-center mt-10 mb-6 text-gray-600">
    Usuários Cadastrados 📋
  </h3>

  <div class="flex justify-center">
    <div class="w-full max-w-6xl">
      <div class="bg-white shadow-xl rounded-lg overflow-hidden">
        <div class="overflow-x-auto">
          <table class="min-w-full divide-y divide-gray-200">
            <thead class="bg-indigo-600">
              <tr>
                <th class="px-6 py-3 text-left text-xs font-medium text-white uppercase tracking-wider w-1/12">ID</th>
                <th class="px-6 py-3 text-left text-xs font-medium text-white uppercase tracking-wider w-6/12">Nome</th>
                <th class="px-6 py-3 text-left text-xs font-medium text-white uppercase tracking-wider w-3/12">Turma</th>
                <th class="px-6 py-3 text-left text-xs font-medium text-white uppercase tracking-wider w-2/12">Ações</th>
              </tr>
            </thead>

            <tbody class="bg-white divide-y divide-gray-200">
              <?php foreach ($data['usuarios'] as $usuario): ?>
              <tr class="hover:bg-gray-50">
                <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900 table-cell-v-middle">
                  <?= $usuario['id'] ?>
                </td>
                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-700 table-cell-v-middle">
                  <?= $usuario['nome'] ?>
                </td>
                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-700 table-cell-v-middle">
                  <?= $usuario['turma'] ?>
                </td>
                <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-center table-cell-v-middle">
                  <a 
                    href="/usuario/excluir/<?=$usuario['id']?>" 
                    class="text-red-600 hover:text-red-900 font-medium border border-red-600 
                           hover:border-red-900 py-1 px-3 rounded-full 
                           transition duration-150 ease-in-out"
                    onclick="return confirm('Tem certeza que deseja excluir este usuário?');"
                  >
                    Excluir
                  </a>
                </td>
              </tr>
              <?php endforeach; ?>
            </tbody>
          </table>

          <?php if (empty($data['usuarios'])): ?>
            <p class="text-center text-gray-500 py-4">Nenhum usuário cadastrado.</p>
          <?php endif; ?>
        </div>
      </div>
    </div>
  </div>
</div>

</body>
