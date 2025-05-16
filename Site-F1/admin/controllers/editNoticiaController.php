<?php

include_once("../../models/Noticia.php");
include_once("../../classes/ManipulaDados.php");

function converte($string)
{
    return iconv("UTF-8", "ISO8859-1", $string);
}

// Verifica se veio ID
if (!isset($_POST['id']) || empty($_POST['id'])) {
    echo "ID da notícia não informado.";
    exit;
}

$id = $_POST['id'];

$conexao = new ManipulaDados();
$conexao->setTable("tb_noticias");

// Busca notícia atual para manter dados como o nome do arquivo antigo
$conexao->setFieldPk("id");
$conexao->setValuePk($id);
$noticiaAtual = $conexao->getData() ?? null;

if (!$noticiaAtual) {
    echo "Notícia não encontrada.";
    exit;
}

// Instancia e preenche a notícia
$noticia = new Noticia();
$noticia->setTitulo($_POST['titulo']);
$noticia->setDescricao($_POST['descricao']);
$noticia->setData($_POST['data']);
$noticia->setAutor($_POST['autor']);

$nomeArquivo = $_FILES['arquivo']['name'] ?? '';
$arquivoTmp = $_FILES['arquivo']['tmp_name'] ?? '';

if (!empty($nomeArquivo)) {
    // Se novo arquivo foi enviado
    $nomeArquivoSalvo = converte($nomeArquivo);
    $url = "imgNoticias/" . $nomeArquivo;
    $urlLocalSalvo = "../../imgNoticias/" . $nomeArquivoSalvo;

    move_uploaded_file($arquivoTmp, $urlLocalSalvo);
    $noticia->setUrl($url);
} else {
    // Se não foi enviado arquivo, mantém o atual
    $noticia->setUrl($noticiaAtual['url']);
}

// Monta o SQL de update
$fields = "titulo = '" . $noticia->getTitulo() . "', ";
$fields .= "descricao = '" . $noticia->getDescricao() . "', ";
$fields .= "url = '" . $noticia->getUrl() . "', ";
$fields .= "data = '" . $noticia->getData() . "', ";
$fields .= "autor = '" . $noticia->getAutor() . "'";

$conexao->setFields($fields);

$conexao->update();

$status = $conexao->getStatus();

header("Location: ../index.php?secao=noticias&status=$status");
