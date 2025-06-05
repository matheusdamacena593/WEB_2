<?php
include_once("classes/ManipulaDados.php");

$recebeNoticias = new ManipulaDados();
$recebeNoticias->setTable("tb_noticias");
$noticias = $recebeNoticias->getAllDataTable();

foreach ($noticias as $noticia) {
?>

    <head>
        <link rel="stylesheet" href="css/apphome.css" type="text/css" />
    </head>

    <div class="container d-flex justify-content-center">
        <div class="card noticia-card">
            <img
                class="card-img-top noticia-img"
                src="images/<?= $noticia['url'] ?>"
                alt="Imagem da Notícia">
            <div class="card-body noticia-body">
                <h5 class="card-title"><?= htmlspecialchars($noticia['titulo']) ?></h5>
                <p class="card-text"><?= nl2br(htmlspecialchars($noticia['descricao'])) ?></p>
                <p class="card-text">
                    <small class="text-muted"><?= htmlspecialchars($noticia['data']) ?> - <?= htmlspecialchars($noticia['autor']) ?></small>
                </p>
            </div>
        </div>
    </div>

<?php
}
?>