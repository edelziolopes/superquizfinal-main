<body>


  <!-- Conteúdo principal -->
  <div class="container py-5">
    <div class="row justify-content-center">
      <div class="col-lg-6">
        <div class="card shadow-sm mb-4">
          <div class="card-header bg-primary text-white">
            <h4 class="mb-0">Cadastrar Pergunta</h4>
          </div>
          <div class="card-body">
            <form action="/pergunta/salvar/" method="POST">
              <div class="mb-3">
                <label for="id_categoria" class="form-label">Categoria</label>
                <select class="form-control" id="id_categoria" name="txt_categoria" required>
                  <option value="" disabled selected>Selecione uma categoria</option>
                  <?php foreach ($data['categorias'] as $categoria): ?>
                  <option value="<?= $categoria['id'] ?>"><?= $categoria['nome'] ?></option>
                  <?php endforeach; ?>
                </select>
              </div>
              <div class="mb-3">
                <label for="pergunta" class="form-label">Pergunta</label>
                <input type="text" class="form-control" id="pergunta" name="txt_pergunta" placeholder="Digite a pergunta" required>
              </div>
              <button type="submit" class="btn btn-primary w-100">Cadastrar</button>
            </form>
          </div>
        </div>
      </div>
    </div>

   <h3 class="text-center mt-5 mb-3 text-secondary">Perguntas Cadastradas</h3>
    <div class="row justify-content-center">
        <div class="col-lg-10">
            <div class="card border-0 shadow-sm">
                <div class="card-body p-0">
                    <div class="table-responsive">
                        <table class="table table-hover mb-0">
                            <thead class="table-primary">
                  <th scope="col">ID</th>
                  <th scope="col">Categoria</th>
                  <th scope="col">Pergunta</th>
                  <th scope="col">Ações</th>
                </tr>
              </thead>
              <tbody>
                <?php foreach ($data['perguntas'] as $pergunta): ?>
                <tr>
                  <td><?= $pergunta['id'] ?></td>
                  <td><?= $pergunta['nome'] ?></td>
                  <td><?= $pergunta['pergunta'] ?></td>
                  <td>
                    <a href="/pergunta/excluir/<?=$pergunta['id']?>" class="btn btn-danger btn-sm">Excluir</a>
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

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>