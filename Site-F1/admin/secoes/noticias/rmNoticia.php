<?php
    include_once("../classes/ManipulaDados.php");

    $recebeNoticias = new ManipulaDados();
    $recebeNoticias->setTable("tb_noticias");
    $recebeNoticias->setFieldPk("id");
    $recebeNoticias->setValuePk($_GET['id']);
    $noticia = $recebeNoticias->getData();

    echo $noticia['titulo'];

?>