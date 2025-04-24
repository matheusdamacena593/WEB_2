<?php
    $usuario = $_POST['txtUsuario'];
    $senha = $_POST['txtSenha'];

    if ($usuario == 'mdx' && $senha == '123') {
        header('location: index.php');
    }else{
        header('location: telalogin.php');
    }
?>