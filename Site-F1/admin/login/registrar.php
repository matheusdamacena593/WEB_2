<?php
session_start();
include_once("../../classes/ManipulaDados.php");
include_once("../../models/Usuario.php");
$manipula = new ManipulaDados();

$usuario = $_POST["txtUsuario"];
$senha = $_POST["txtSenha"];

$manipula->setTable("tb_usuarios");

$manipula->setFields("usuario,senha");

$usuarioObj = new Usuario();

$usuarioObj->setUsuario($usuario);
$usuarioObj->setSenha($senha);

$dados = implode("','", [
    $usuarioObj->getUsuario(),
    $usuarioObj->getSenha()
]);

$manipula->setDados($dados);
$manipula->insert();

$status = $manipula->getStatus();

header("Location: ../login/telalogin.php?&status=$status");
