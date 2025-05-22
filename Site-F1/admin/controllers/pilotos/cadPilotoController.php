<?php

include_once("../../../models/Piloto.php");
include_once("../../../classes/ManipulaDados.php");

function converte($string)
{
    return iconv("UTF-8", "ISO8859-1", $string);
}

$conexao = new ManipulaDados();
$conexao->setTable("tb_pilotos");

$conexao->setFields("nome,vitorias,pontos,nacionalidade,url,equipe_id");

$piloto = new Piloto();

$piloto->setNome($_POST['txtNome']);
$piloto->setVitorias($_POST['txtVitorias']);
$piloto->setPontos($_POST['txtPontos']);
$piloto->setNacionalidade($_POST['txtNacionalidade']);

$nomeArquivo = $_FILES['txtUrl']['name'];

$piloto->setUrl("imgPilotos/" . $nomeArquivo);

$nomeArquivoSalvo = converte($_FILES['txtUrl']['name']);
$urlLocalSalvo = "../../../imgPilotos/" . $nomeArquivoSalvo;

move_uploaded_file($_FILES['txtUrl']['tmp_name'], $urlLocalSalvo);


$piloto->setEquipeId($_POST['txtEquipe']);

$dados = implode("','", [
    $piloto->getNome(),
    $piloto->getVitorias(),
    $piloto->getPontos(),
    $piloto->getNacionalidade(),
    $piloto->getUrl(),
    $piloto->getEquipeId()
]);
$conexao->setDados($dados);
$conexao->insert();
$status = $conexao->getStatus();

header("Location: ../../index.php?secao=pilotos&status=$status");