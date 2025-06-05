<?php
    setcookie("nome_usuario");
    setcookie("senha_usuario");
    session_start();
    session_unset();
    session_destroy();
    header("Location: ../../index.php"); // Redireciona para a página inicial
    exit();