<?php
    include_once("classes/ManipulaDados.php");

    $recebeNoticias = new ManipulaDados();
    $recebeNoticias->setTable("tb_noticias");
    $noticias = $recebeNoticias->getAllDataTable();

    foreach ($noticias as $noticia) {
?>

<div class="card mt-5">
    <div class="card-body">
        <h5 class="card-title"><?=$noticia['titulo']?></h5>
        <p class="card-text"><?=$noticia['descricao']?></p>
        <p class="card-text"><small><?=$noticia['data']?> - <?=$noticia['autor']?></small></p>
    </div>
    <img class="card-img-bottom img-fluid w-50 mx-auto d-block" src="<?=$noticia['url']?>" alt="Noticia Atual"> 
</div>

<?php
    }
?>