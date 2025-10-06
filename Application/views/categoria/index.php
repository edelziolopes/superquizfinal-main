<div class="container mt-5">
  <div class="row justify-content-center">
    <div class="col-md-8">
      <div class="card mb-4">
        <div class="card-header bg-primary text-white">
          <h4 class="mb-0">Cadastrar Categoria</h4>
        </div>
        <div class="card-body">
          <form action="/categoria/salvar" method="POST">
            <div class="mb-3">
              <label for="nome" class="form-label">Nome da Categoria</label>
              <input type="text" class="form-control" id="nome" name="nome" placeholder="Ex: Matemática" required>
            </div>
            <button type="submit" class="btn btn-primary">Cadastrar</button>
          </form>
        </div>
      </div>
      <div class="card mt-4">
        <div class="card-header bg-dark text-white">
          <h4 class="mb-0">Categorias Cadastradas</h4>
        </div>
        <div class="card-body">
          <div class="table-responsive">
            <table class="table mx-auto" style="width: 80%;">
              <thead class="thead-dark">
                <tr>
                  <th scope="col">ID</th>
                  <th scope="col">Nome</th>
                  <th scope="col">Ações</th>
                </tr>
              </thead>
              <tbody>
                <?php foreach ($data['categorias'] as $categoria): ?>
                <tr>
                  <th scope="row"><?=$categoria['id']?></th>
                  <td><?=$categoria['nome']?></td>
                  <td><a href="/categoria/excluir/<?=$categoria['id']?>" class="btn btn-danger">Excluir</a></td>
                </tr>
                <?php endforeach; ?>
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
