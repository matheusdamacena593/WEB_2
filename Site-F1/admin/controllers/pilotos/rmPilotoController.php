<?php

include_once("../../../classes/ManipulaDados.php");

if (!isset($_POST['id'])) {
    header("Location: ../../index.php?secao=pilotos&status=Erro ao remover notícia");
}

$id = $_POST['id'];

$conexao = new ManipulaDados();
$conexao->setTable("tb_pilotos");
$conexao->setFieldPk("id");
$conexao->setValuePk($id);

$dados = $conexao->getData();

if ($dados && isset($dados['url'])) {
    $caminhoImagem = "../../../images/" . $dados['url'];

    if (file_exists($caminhoImagem)) {
        unlink($caminhoImagem);
    }
}


$conexao->delete();
$status = $conexao->getStatus();

header("Location: ../../index.php?secao=pilotos&status=$status");
