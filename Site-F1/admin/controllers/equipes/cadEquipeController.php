<?php

include_once("../../../models/Equipe.php");
include_once("../../../classes/ManipulaDados.php");

function converte($string)
{
    return iconv("UTF-8", "ISO8859-1", $string);
}

$conexao = new ManipulaDados();
$conexao->setTable("tb_equipes");

$conexao->setFields("nome,formotor,nacionalidade,url,vitorias,pontos");

$equipe = new Equipe();

$equipe->setNome($_POST['txtNome']);
$equipe->setFormotor($_POST['txtFormotor']);
$equipe->setNacionalidade($_POST['txtNacionalidade']);

$nomeArquivo = $_FILES['txtUrl']['name'];

$equipe->setUrl("imgEquipes/" . $nomeArquivo);

$nomeArquivoSalvo = converte($_FILES['txtUrl']['name']);
$urlLocalSalvo = "../../../imgEquipes/" . $nomeArquivoSalvo;

move_uploaded_file($_FILES['txtUrl']['tmp_name'], $urlLocalSalvo);

$equipe->setVitorias($_POST['txtVitorias']);
$equipe->setPontos($_POST['txtPontos']);

$dados = implode("','", [
    $equipe->getNome(),
    $equipe->getFormotor(),
    $equipe->getNacionalidade(),
    $equipe->getUrl(),
    $equipe->getVitorias(),
    $equipe->getPontos()
]);

$conexao->setDados($dados);
$conexao->insert();

$status = $conexao->getStatus();

header("Location: ../../index.php?secao=equipes&status=$status");
