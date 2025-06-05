<?php
session_start(); // Importante garantir que está no topo do arquivo

// Suponha que o nome do usuário esteja salvo na sessão como 'usuario_nome'
$usuario_logado = isset($_SESSION['usuario']);
?>

<div class="d-flex justify-content-end align-items-center my-2">
    <div class="d-flex gap-2">
        <?php if ($usuario_logado): ?>
            <span class="fw-bold align-self-center">
                Olá, <?= htmlspecialchars($_SESSION['usuario']) ?>
            </span>
            <form action="login/logout.php" method="post">
                <button class="btn btn-danger fw-bold px-4" type="submit">
                    Sair
                </button>
            </form>
        <?php else: ?>
            <button class="btn btn-danger fw-bold px-4"
                onclick="window.location.href='admin/login/telalogin.php'">
                Login
            </button>
            <button class="btn btn-outline-secondary fw-bold px-4 bg-white"
                onclick="window.location.href='admin/login/telaregistrar.php'">
                Registrar
            </button>
        <?php endif; ?>
    </div>
</div>
