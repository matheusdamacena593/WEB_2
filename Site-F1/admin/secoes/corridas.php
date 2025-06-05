<?php
    include_once("../classes/ManipulaDados.php");

    $recebeCorridas = new ManipulaDados();
    $recebeCorridas->setTable("tb_corridas");
    $corridas = $recebeCorridas->getAllDataTable();
?>

<div class="container mt-5">
    <?php if (isset($_GET['status'])): ?>
        <div class="alert alert-success text-center">
            <?= htmlspecialchars($_GET['status']) ?>
        </div>
    <?php endif; ?>
    <h1>Criar Nova Corrida</h1>
    <a href="index.php?secao=corridas/cadCorridas" class="btn btn-primary">Criar Corrida</a>

    <h1 class="text-center">Corridas</h1>
    <table class="table table-striped table-hover">
        <thead>
            <tr>
                <th>Pista</th>
                <th>Local</th>
                <th>Data</th>
                <th>Ações</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($corridas as $corrida): ?>
                <tr>
                    <td><?= $corrida['pista'] ?></td>
                    <td><?= $corrida['local'] ?></td>
                    <td><?= $corrida['data'] ?></td>
                    <td><a href="index.php?secao=corridas/editCorridas&id=<?= $corrida['id'] ?>" class="btn btn-outline-primary">Alterar</a>
                        <button type="button" class="btn btn-outline-danger ms-2" data-bs-toggle="modal" data-bs-target="#modalRemover<?= $corrida['id'] ?>">Remover</button></td>

                    <div class="modal fade" id="modalRemover<?= $corrida['id'] ?>" tabindex="-1" aria-labelledby="modalRemoverLabel<?= $corrida['id'] ?>" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="modalRemoverLabel<?= $corrida['id'] ?>">Confirmar Remoção</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Fechar"></button>
                                </div>
                                <div class="modal-body">
                                    Tem certeza que deseja remover a notícia "<strong><?= $corrida['pista'] ?></strong>"?
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                                    <form method="post" action="controllers/corridas/rmCorridaController.php">
                                        <input type="hidden" name="id" value="<?= $corrida['id'] ?>">
                                        <button type="submit" class="btn btn-danger">Remover</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </tr>

            <?php endforeach; ?>
        </tbody>
    </table>
</div>