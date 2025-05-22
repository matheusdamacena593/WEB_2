<?php
session_start();
include_once("../../classes/ManipulaDados.php");
$manipula = new ManipulaDados();

$usuario = $_POST["txtUsuario"];
$senha = $_POST["txtSenha"];
$linhas = $manipula->validarLogin($usuario, $senha);

if ($linhas == 0 ){
    echo "<script>alert('Usuario ou senha digitados incorretamente');</script>";
    echo "<script>location = 'telalogin.php';</script>";
}else{
    $_SESSION["usuario"] = $usuario;
    $_SESSION["senha"] = $senha;
    setcookie("nome_usuario", $usuario);
    setcookie("senha_usuario", $senha);
    header("location: ../index.php");
}
