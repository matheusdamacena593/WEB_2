<?php

include_once("../../../models/Corrida.php");
include_once("../../../classes/ManipulaDados.php");

function converte($string)
{
    return iconv("UTF-8", "ISO8859-1", $string);
}

// Verifica se veio ID
if (!isset($_POST['id']) || empty($_POST['id'])) {
    echo "ID da corrida não informado.";
    exit;
}

$id = $_POST['id'];

$conexao = new ManipulaDados();
$conexao->setTable("tb_corridas");

$conexao->setFieldPk("id");
$conexao->setValuePk($id);
$corridaAtual = $conexao->getData() ?? null;

if (!$corridaAtual) {
    echo "Equipe não encontrada.";
    exit;
}

$corrida = new Corrida();
$corrida->setPista($_POST['txtPista']);
$corrida->setLocal($_POST['txtLocal']);
$corrida->setData($_POST['txtData']);

$nomeArquivo = $_FILES['txtUrl']['name'] ?? '';
$arquivoTmp = $_FILES['txtUrl']['tmp_name'] ?? '';

if (!empty($nomeArquivo)) {
    $caminhoAntigo = "../../../images/" . $corridaAtual['url'];

    if (file_exists($caminhoAntigo)) {
        unlink($caminhoAntigo);
    }

    $nomeArquivoSalvo = converte($nomeArquivo);
    $url = "imgCorridas/" . $nomeArquivo;
    $urlLocalSalvo = "../../../images/imgCorridas/" . $nomeArquivoSalvo;

    move_uploaded_file($arquivoTmp, $urlLocalSalvo);
    $corrida->setUrl($url);
} else {
    // Se não foi enviado arquivo, mantém o atual
    $corrida->setUrl($corridaAtual['url']);
}

// Monta o SQL de update
$fields = "pista = '" . $corrida->getPista() . "', ";
$fields .= "local = '" . $corrida->getLocal() . "', ";
$fields .= "data = '" . $corrida->getData() . "', ";
$fields .= "url = '" . $corrida->getUrl() . "'";
$conexao->setFields($fields);
$conexao->update();

$status = $conexao->getStatus();
header("Location: ../../index.php?secao=corridas&status=$status");


