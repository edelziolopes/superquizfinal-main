
<div class="container py-5">
    <div class="row justify-content-center">
        <div class="col-lg-5">
            <div class="card shadow-sm border-0">
                <div class="card-body">
                    <h4 class="card-title mb-4 text-center text-primary">Cadastro de Respostas</h4>
                    <form action="/resposta/salvar/" method="POST">
                        <div class="mb-3">
                            <label for="id_pergunta" class="form-label">Pergunta</label>
                            <select class="form-control" id="id_pergunta" name="txt_pergunta" required>
                                <option value="" disabled selected>Escolha uma pergunta</option>
                                <?php foreach ($data['perguntas'] as $pergunta): ?>
                                <option value="<?= $pergunta['id'] ?>"><?= $pergunta['pergunta'] ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Alternativas</label>
                            <input type="text" class="form-control mb-2" name="alternativa_a" placeholder="Alternativa A" required>
                            <input type="text" class="form-control mb-2" name="alternativa_b" placeholder="Alternativa B" required>
                            <input type="text" class="form-control mb-2" name="alternativa_c" placeholder="Alternativa C" required>
                            <input type="text" class="form-control" name="alternativa_d" placeholder="Alternativa D" required>
                        </div>
                        <div class="mb-3">
                            <label for="resposta" class="form-label">Resposta Correta</label>
                            <select class="form-control" id="resposta" name="resposta" required>
                                <option value="" selected disabled>Selecione a alternativa correta</option>
                                <option value="A">Alternativa A</option>
                                <option value="B">Alternativa B</option>
                                <option value="C">Alternativa C</option>
                                <option value="D">Alternativa D</option>
                            </select>
                        </div>
                        <button type="submit" class="btn btn-primary w-100">Cadastrar Resposta</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <h3 class="text-center mt-5 mb-3 text-secondary">Respostas Cadastradas</h3>
    <div class="row justify-content-center">
        <div class="col-lg-10">
            <div class="card border-0 shadow-sm">
                <div class="card-body p-0">
                    <div class="table-responsive">
                        <table class="table table-hover mb-0">
                            <thead class="table-primary">
                                <tr>
                                    <th>ID</th>
                                    <th>Pergunta</th>
                                    <th>Alternativas</th>
                                    <th>Resposta</th>
                                    <th>Ações</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($data['respostas'] as $resposta): ?>
                                <tr>
                                    <td><?= $resposta['id'] ?></td>
                                    <td><?= $resposta['pergunta'] ?></td>
                                    <td>
                                        <span class="badge bg-light text-dark">A</span> <?= $resposta['alternativa_a'] ?><br>
                                        <span class="badge bg-light text-dark">B</span> <?= $resposta['alternativa_b'] ?><br>
                                        <span class="badge bg-light text-dark">C</span> <?= $resposta['alternativa_c'] ?><br>
                                        <span class="badge bg-light text-dark">D</span> <?= $resposta['alternativa_d'] ?>
                                    </td>
                                    <td>
                                        <span class="badge bg-success"><?= $resposta['resposta'] ?></span>
                                    </td>
                                    <td>
                                        <a href="/resposta/excluir/<?=$resposta['id']?>" class="btn btn-outline-danger btn-sm rounded-pill">Excluir</a>
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
</div>