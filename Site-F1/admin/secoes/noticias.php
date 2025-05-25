<?php
include_once("../classes/ManipulaDados.php");

$recebeNoticias = new ManipulaDados();
$recebeNoticias->setTable("tb_noticias");
$noticias = $recebeNoticias->getAllDataTable();
?>

<div class="container mt-5">
    <?php if (isset($_GET['status'])): ?>
        <div class="alert alert-success text-center">
            <?= htmlspecialchars($_GET['status']) ?>
        </div>
    <?php endif; ?>
    <h1>Criar Nova Notícia</h1>
    <a href="index.php?secao=noticias/cadNoticia" class="btn btn-primary">Criar Notícia</a>

    <h1 class="text-center">Notícias</h1>
    <table class="table table-striped table-hover">
        <thead>
            <tr>
                <th>Título</th>
                <th>Descrição</th>
                <th>Data</th>
                <th>Autor</th>
                <th>Açoes</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($noticias as $noticia): ?>
                <tr>
                    <td><?= $noticia['titulo'] ?></td>
                    <td><?= $noticia['descricao'] ?></td>
                    <td><?= $noticia['data'] ?></td>
                    <td><?= $noticia['autor'] ?></td>
                    <td><a href="index.php?secao=noticias/editNoticia&id=<?= $noticia['id'] ?>" class="btn btn-outline-primary">Alterar</a><button type="button" class="btn btn-outline-danger ms-2" data-bs-toggle="modal" data-bs-target="#modalRemover<?= $noticia['id'] ?>">Remover</button></td>

                    <div class="modal fade" id="modalRemover<?= $noticia['id'] ?>" tabindex="-1" aria-labelledby="modalRemoverLabel<?= $noticia['id'] ?>" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="modalRemoverLabel<?= $noticia['id'] ?>">Confirmar Remoção</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Fechar"></button>
                                </div>
                                <div class="modal-body">
                                    Tem certeza que deseja remover a notícia "<strong><?= $noticia['titulo'] ?></strong>"?
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                                    <form method="post" action="controllers/noticias/rmNoticiaController.php">
                                        <input type="hidden" name="id" value="<?= $noticia['id'] ?>">
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