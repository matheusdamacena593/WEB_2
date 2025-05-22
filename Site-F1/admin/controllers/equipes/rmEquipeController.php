<?php

include_once("../../../classes/ManipulaDados.php");

if (!isset($_POST['id'])) {
    header("Location: ../index.php?secao=noticias&status=Erro ao remover notícia");
}

$id = $_POST['id'];

var_dump($id);

$conexao = new ManipulaDados();
$conexao->setTable("tb_equipes");
$conexao->setFieldPk("id");
$conexao->setValuePk($id);


$dados = $conexao->getData();

$conexao->delete();
$status = $conexao->getStatus();

header("Location: ../../index.php?secao=equipes&status=$status");
