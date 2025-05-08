<?php

include_once ("../../models/Noticia.php");

function converte($string){
    return iconv("UTF-8","ISO8859-1", $string);
}

$noticia = new Noticia();

$noticia->setTitulo($_POST['titulo']);
$noticia->setDescricao($_POST['descricao']);

$nomeArquivo = $_FILES['arquivo']['name'];
echo''.$nomeArquivo.'';

$noticia->setUrl("imgNoticias/". $nomeArquivo);

$nomeArquivoSalvo = converte($_FILES['arquivo']['name']);
$urlLocalSalvo = "../../imgNoticias/".$nomeArquivoSalvo;

move_uploaded_file($_FILES['arquivo']['tmp_name'], $urlLocalSalvo);

$noticia->setData($_POST['data']);
$noticia->setAutor($_POST['autor']);

echo "Notícia recebida com sucesso!!!";
echo "Título: ".$noticia->getTitulo()."<br/>Descrição";
?>