
  <!-- Conteúdo principal -->
  <div class="container py-5">
    <div class="row justify-content-center">
      <div class="col-lg-6">
        <div class="card shadow-sm mb-4">
          <div class="card-header bg-primary text-white">
            <h4 class="mb-0">Cadastrar Usuário</h4>
          </div>
          <div class="card-body">
            <form action="/usuario/salvar/" method="POST">
              <div class="mb-3">
                <label for="nome" class="form-label">Nome</label>
                <input type="text" class="form-control" id="nome" name="nome" placeholder="Digite o nome do usuário" required>
              </div>
              <div class="mb-3">
                <label for="turma" class="form-label">Turma</label>
                <select class="form-control" id="turma" name="turma" required>
                  <option value="">Selecione a turma</option>
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
                  <option value="Visitante">Visitante</option>
                </select>
              </div>
              <button type="submit" class="btn btn-primary w-100">Cadastrar</button>
            </form>
          </div>
        </div>
      </div>
    </div>

   <h3 class="text-center mt-5 mb-3 text-secondary">Usuarios Cadastradas</h3>
    <div class="row justify-content-center">
        <div class="col-lg-10">
            <div class="card border-0 shadow-sm">
                <div class="card-body p-0">
                    <div class="table-responsive">
                        <table class="table table-hover mb-0">
                            <thead class="table-primary">
                <tr>
                  <th scope="col">ID</th>
                  <th scope="col">Nome</th>
                  <th scope="col">Turma</th>
                  <th scope="col">Ações</th>
                </tr>
              </thead>
              <tbody>
                <?php foreach ($data['usuarios'] as $usuario): ?>
                <tr>
                  <td><?= $usuario['id'] ?></td>
                  <td><?= $usuario['nome'] ?></td>
                  <td><?= $usuario['turma'] ?></td>
                  <td>
                    <a href="/usuario/excluir/<?=$usuario['id']?>" class="btn btn-sm btn-danger" onclick="return confirm('Tem certeza que deseja excluir este usuário?');">Excluir</a>
                  </td>
                </tr>
                <?php endforeach; ?>
              </tbody>
            </table>
            <?php if (empty($data['usuarios'])): ?>
              <p class="text-center text-muted mt-3">Nenhum usuário cadastrado.</p>
            <?php endif; ?>
          </div>
        </div>
      </div>
    </div>
  </div>

  <!-- Bootstrap JS CDN -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>