<?php

include_once("../../../models/Noticia.php");
include_once("../../../classes/ManipulaDados.php");

function converte($string)
{
    return iconv("UTF-8", "ISO8859-1", $string);
}

$conexao = new ManipulaDados();
$conexao->setTable("tb_noticias");

$conexao->setFields("titulo,descricao,url,data,autor");

$noticia = new Noticia();

$noticia->setTitulo($_POST['titulo']);
$noticia->setDescricao($_POST['descricao']);

$nomeArquivo = $_FILES['arquivo']['name'];

$noticia->setUrl("imgNoticias/" . $nomeArquivo);

$nomeArquivoSalvo = converte($_FILES['arquivo']['name']);
$urlLocalSalvo = "../../../imgNoticias/" . $nomeArquivoSalvo;

move_uploaded_file($_FILES['arquivo']['tmp_name'], $urlLocalSalvo);

$noticia->setData($_POST['data']);
$noticia->setAutor($_POST['autor']);

$dados = implode("','", [
    $noticia->getTitulo(),
    $noticia->getDescricao(),
    $noticia->getUrl(),
    $noticia->getData(),
    $noticia->getAutor()
]);

$conexao->setDados($dados);
$conexao->insert();

$status = $conexao->getStatus();

header("Location: ../../index.php?secao=noticias&status=$status");
