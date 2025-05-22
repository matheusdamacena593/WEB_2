<?php

include_once("../../../models/Equipe.php");
include_once("../../../classes/ManipulaDados.php");

function converte($string)
{
    return iconv("UTF-8", "ISO8859-1", $string);
}

$conexao = new ManipulaDados();
$conexao->setTable("tb_equipes");

$conexao->setFields("nome,formotor,nacionalidade");

$equipe = new Equipe();

$equipe->setNome($_POST['txtNome']);
$equipe->setFormotor($_POST['txtFormotor']);
$equipe->setNacionalidade($_POST['txtNacionalidade']);

$dados = implode("','", [
    $equipe->getNome(),
    $equipe->getFormotor(),
    $equipe->getNacionalidade()
]);

$conexao->setDados($dados);
$conexao->insert();

$status = $conexao->getStatus();

header("Location: ../../index.php?secao=equipes&status=$status");
