<?php

include_once("../../../models/Piloto.php");
include_once("../../../classes/ManipulaDados.php");

function converte($string)
{
    return iconv("UTF-8", "ISO8859-1", $string);
}

if (!isset($_POST['id']) || empty($_POST['id'])) {
    echo "ID do piloto não informado.";
    exit;
}

$id = $_POST['id'];

$conexao = new ManipulaDados();
$conexao->setTable("tb_pilotos");

$conexao->setFieldPk("id");
$conexao->setValuePk($id);
$pilotoAtual = $conexao->getData() ?? null;

$piloto = new Piloto();

$piloto->setNome($_POST['txtNome']);
$piloto->setVitorias($_POST['txtVitorias']);
$piloto->setPontos($_POST['txtPontos']);
$piloto->setNacionalidade($_POST['txtNacionalidade']);
$piloto->setEquipeId($_POST['txtEquipe']);

$nomeArquivo = $_FILES['txtUrl']['name'] ?? '';
$arquivoTmp = $_FILES['txtUrl']['tmp_name'] ?? '';

if (!empty($nomeArquivo)) {
    $caminhoAntigo = "../../../" . $pilotoAtual['url'];

    if (file_exists($caminhoAntigo)) {
        unlink($caminhoAntigo);
    }

    $nomeArquivoSalvo = converte($nomeArquivo);
    $url = "imgPilotos/" . $nomeArquivo;
    $urlLocalSalvo = "../../../imgPilotos/" . $nomeArquivoSalvo;

    move_uploaded_file($arquivoTmp, $urlLocalSalvo);
    $piloto->setUrl($url);
} else {
    // Se não foi enviado arquivo, mantém o atual
    $piloto->setUrl($pilotoAtual['url']);
}

$fields = "nome = '" . $piloto->getNome() . "', ";
$fields .= "vitorias = '" . $piloto->getVitorias() . "', ";
$fields .= "pontos = '" . $piloto->getPontos() . "', ";
$fields .= "nacionalidade = '" . $piloto->getNacionalidade() . "', ";
$fields .= "url = '" . $piloto->getUrl() . "', ";
$fields .= "equipe_id = '" . $piloto->getEquipeId() . "'";
$conexao->setFields($fields);

$conexao->update();

$status = $conexao->getStatus();

header("Location: ../../index.php?secao=pilotos&status=$status");
