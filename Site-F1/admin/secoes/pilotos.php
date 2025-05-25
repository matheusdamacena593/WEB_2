<?php
include_once("../classes/ManipulaDados.php");

$manipula = new ManipulaDados();
$manipula->setTable("tb_pilotos");
$pilotos = $manipula->getAllDataTable();

$manipula->setTable("tb_equipes");
$manipula->setFieldPk("id");
?>

<div class="container mt-5">
    <?php if (isset($_GET['status'])): ?>
        <div class="alert alert-success text-center">
            <?= htmlspecialchars($_GET['status']) ?>
        </div>
    <?php endif; ?>
    <h1>Criar Nova Piloto</h1>
    <a href="index.php?secao=pilotos/cadPilotos" class="btn btn-primary">Criar Piloto</a>

    <h1 class="text-center">Pilotos</h1>
    <table class="table table-striped table-hover">
        <thead>
            <tr>
                <th>Nome</th>
                <th>Pontos</th>
                <th>Vitórias</th>
                <th>Nacionalidade</th>
                <th>Equipe</th>
                <th>Ações</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($pilotos as $piloto):
                $manipula->setValuePk($piloto['equipe_id']);
                $equipe = $manipula->getData(); ?>
                <tr>
                    <td><?= $piloto['nome'] ?></td>
                    <td><?= $piloto['pontos'] ?></td>
                    <td><?= $piloto['vitorias'] ?></td>
                    <td><?= $piloto['nacionalidade'] ?></td>
                    <td><?= $equipe['nome'] ?></td>
                    <td><a href="index.php?secao=pilotos/editPilotos&id=<?= $piloto['id'] ?>"
                            class="btn btn-outline-primary">Alterar</a><button type="button" class="btn btn-outline-danger ms-2" data-bs-toggle="modal"
                            data-bs-target="#modalRemover<?= $piloto['id'] ?>">Remover</button></td>

                    <div class="modal fade" id="modalRemover<?= $piloto['id'] ?>" tabindex="-1"
                        aria-labelledby="modalRemoverLabel<?= $piloto['id'] ?>" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="modalRemoverLabel<?= $piloto['id'] ?>">Confirmar Remoção
                                    </h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                        aria-label="Fechar"></button>
                                </div>
                                <div class="modal-body">
                                    Tem certeza que deseja remover a notícia "<strong><?= $piloto['nome'] ?></strong>"?
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary"
                                        data-bs-dismiss="modal">Cancelar</button>
                                    <form method="post" action="controllers/pilotos/rmPilotoController.php">
                                        <input type="hidden" name="id" value="<?= $piloto['id'] ?>">
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