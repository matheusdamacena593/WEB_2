<?php
include_once("../../classes/ManipulaDados.php");
$manipula = new ManipulaDados();

if (isSet($_COOKIE["nome_usuario"]))
    $nomeUsuario = $_COOKIE["nome_usuario"];

if (isSet($_COOKIE["senha_usuario"]))
    $senhaUsuario = $_COOKIE["senha_usuario"];

if (!empty($nomeUsuario) || empty($senhaUsuario)) {
    $linhas = $manipula->validarLogin($nomeUsuario, $senhaUsuario);
    if ($linhas == 0) {
        setcookie("nome_usuario");
        setcookie("senha_usuario");
        header("location: telalogin.php");
        exit;
    } else {
        header("location: index.php");
        exit;
    }
} else {
    header("location: telalogin.php");
}
