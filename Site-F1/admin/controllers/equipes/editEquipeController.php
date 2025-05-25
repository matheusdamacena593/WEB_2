<?php

include_once("../../../models/Equipe.php");
include_once("../../../classes/ManipulaDados.php");

function converte($string)
{
    return iconv("UTF-8", "ISO8859-1", $string);
}

// Verifica se veio ID
if (!isset($_POST['id']) || empty($_POST['id'])) {
    echo "ID da equipe não informado.";
    exit;
}

$id = $_POST['id'];

$conexao = new ManipulaDados();
$conexao->setTable("tb_equipes");

// Busca notícia atual para manter dados como o nome do arquivo antigo
$conexao->setFieldPk("id");
$conexao->setValuePk($id);
$equipeAtual = $conexao->getData() ?? null;

if (!$equipeAtual) {
    echo "Equipe não encontrada.";
    exit;
}

// Instancia e preenche a notícia
$equipe = new Equipe();
$equipe->setNome($_POST['txtNome']);
$equipe->setFormotor($_POST['txtFormotor']);
$equipe->setNacionalidade($_POST['txtNacionalidade']);

$nomeArquivo = $_FILES['txtUrl']['name'] ?? '';
$arquivoTmp = $_FILES['txtUrl']['tmp_name'] ?? '';

if (!empty($nomeArquivo)) {
    $caminhoAntigo = "../../../" . $equipeAtual['url'];

    if (file_exists($caminhoAntigo)) {
        unlink($caminhoAntigo);
    }

    $nomeArquivoSalvo = converte($nomeArquivo);
    $url = "imgEquipes/" . $nomeArquivo;
    $urlLocalSalvo = "../../../imgEquipes/" . $nomeArquivoSalvo;

    move_uploaded_file($arquivoTmp, $urlLocalSalvo);
    $equipe->setUrl($url);
} else {
    // Se não foi enviado arquivo, mantém o atual
    $equipe->setUrl($equipeAtual['url']);
}

$equipe->setVitorias($_POST['txtVitorias']);
$equipe->setPontos($_POST['txtPontos']);

// Monta o SQL de update
$fields = "nome = '" . $equipe->getNome() . "', ";
$fields .= "formotor = '" . $equipe->getFormotor() . "', ";
$fields .= "nacionalidade = '" . $equipe->getNacionalidade() . "',";
$fields .= "url = '" . $equipe->getUrl() . "', ";
$fields .= "vitorias = '" . $equipe->getVitorias() . "', ";
$fields .= "pontos = '" . $equipe->getPontos() . "'";
$conexao->setFields($fields);
$conexao->update();

$status = $conexao->getStatus();

header("Location: ../../index.php?secao=equipes&status=$status");
