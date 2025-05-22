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

// Monta o SQL de update
$fields = "nome = '" . $equipe->getNome() . "', ";
$fields .= "formotor = '" . $equipe->getFormotor() . "', ";
$fields .= "nacionalidade = '" . $equipe->getNacionalidade() . "'";
$conexao->setFields($fields);
$conexao->update();

$status = $conexao->getStatus();

header("Location: ../../index.php?secao=equipes&status=$status");