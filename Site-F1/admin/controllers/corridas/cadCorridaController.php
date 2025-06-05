<?php

include_once("../../../models/Corrida.php");
include_once("../../../classes/ManipulaDados.php");

function converte($string)
{
    return iconv("UTF-8", "ISO8859-1", $string);
}

$conexao = new ManipulaDados();
$conexao->setTable("tb_corridas");

$conexao->setFields("pista,local,data,url");

$corrida = new Corrida();

$corrida->setPista($_POST['txtPista']);
$corrida->setLocal($_POST['txtLocal']);
$corrida->setData($_POST['txtData']);

$nomeArquivo = $_FILES['txtUrl']['name'];

$corrida->setUrl("imgCorridas/" . $nomeArquivo);

$nomeArquivoSalvo = converte($_FILES['txtUrl']['name']);
$urlLocalSalvo = "../../../images/imgCorridas/" . $nomeArquivoSalvo;

move_uploaded_file($_FILES['txtUrl']['tmp_name'], $urlLocalSalvo);

$dados = implode("','", [
    $corrida->getPista(),
    $corrida->getLocal(),
    $corrida->getData(),
    $corrida->getUrl()
]);

$conexao->setDados($dados);
$conexao->insert();
$status = $conexao->getStatus();
header("Location: ../../index.php?secao=corridas&status=$status");


