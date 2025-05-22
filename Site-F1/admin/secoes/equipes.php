<?php
    include_once("../classes/ManipulaDados.php");

    $recebeEquipes = new ManipulaDados();
    $recebeEquipes->setTable("tb_equipes");
    $equipes = $recebeEquipes->getAllDataTable();
?>

<div class="container mt-5">
    <?php if (isset($_GET['status'])): ?>
        <div class="alert alert-success text-center">
            <?= htmlspecialchars($_GET['status']) ?>
        </div>
    <?php endif; ?>
    <h1>Criar Nova Equipe</h1>
    <a href="index.php?secao=equipes/cadEquipes" class="btn btn-primary">Criar Equipe</a>

    <h1 class="text-center">Equipes</h1>
    <table class="table table-striped table-hover">
        <thead>
            <tr>
                <th>Nome</th>
                <th>Fornecedor de Motor</th>
                <th>Nacionalidade</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($equipes as $equipe): ?>
                <tr>
                    <td><?= $equipe['nome'] ?></td>
                    <td><?= $equipe['formotor'] ?></td>
                    <td><?= $equipe['nacionalidade'] ?></td>
                    <td><a href="index.php?secao=equipes/editEquipes&id=<?= $equipe['id'] ?>" class="btn btn-outline-primary">Alterar</a></td>
                    <td><button type="button" class="btn btn-outline-danger" data-bs-toggle="modal" data-bs-target="#modalRemover<?= $equipe['id'] ?>">Remover</button></td>

                    <div class="modal fade" id="modalRemover<?= $equipe['id'] ?>" tabindex="-1" aria-labelledby="modalRemoverLabel<?= $equipe['id'] ?>" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="modalRemoverLabel<?= $equipe['id'] ?>">Confirmar Remoção</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Fechar"></button>
                                </div>
                                <div class="modal-body">
                                    Tem certeza que deseja remover a notícia "<strong><?= $equipe['nome'] ?></strong>"?
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                                    <form method="post" action="controllers/equipes/rmEquipeController.php">
                                        <input type="hidden" name="id" value="<?= $equipe['id'] ?>">
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