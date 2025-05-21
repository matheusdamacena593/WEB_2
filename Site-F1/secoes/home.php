<?php
include_once("classes/ManipulaDados.php");

$recebeNoticias = new ManipulaDados();
$recebeNoticias->setTable("tb_noticias");
$noticias = $recebeNoticias->getAllDataTable();

foreach ($noticias as $noticia) {
?>

    <div class="container d-flex justify-content-center">
        <div class="card mt-5" style="max-width: 600px; width: 100%;">
            <div class="card-body">
                <h5 class="card-title"><?= $noticia['titulo'] ?></h5>
                <p class="card-text"><?= $noticia['descricao'] ?></p>
                <p class="card-text"><small><?= $noticia['data'] ?> - <?= $noticia['autor'] ?></small></p>
            </div>
            <img class="card-img-bottom img-fluid mx-auto d-block" src="<?= $noticia['url'] ?>" alt="Noticia Atual" style="max-height: 300px; object-fit: cover;">
        </div>
    </div>

<?php
}
?>