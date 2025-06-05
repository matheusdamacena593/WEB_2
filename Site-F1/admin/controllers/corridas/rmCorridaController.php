<?php

include_once("../../../classes/ManipulaDados.php");

if (!isset($_POST['id'])) {
    header("Location: ../index.php?secao=corridas&status=Erro ao remover corrida");
}

$id = $_POST['id'];

$conexao = new ManipulaDados();
$conexao->setTable("tb_corridas");
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

header("Location: ../../index.php?secao=corridas&status=$status");
