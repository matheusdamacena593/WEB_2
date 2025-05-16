<?php
    $usuario = $_POST['txtUsuario'];
    $senha = $_POST['txtSenha'];

    if ($usuario == 'matheus' && $senha == 'ifg') {
        header('location: index.php');
    }else{
        header('location: telalogin.php');
    }
?>