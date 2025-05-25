<?php
include_once("classes/ManipulaDados.php");

// Buscar pilotos
$manipula = new ManipulaDados();
$manipula->setTable("tb_pilotos");
$pilotos = $manipula->getAllDataTable();

// Buscar equipes (para mostrar o nome)
$manipula->setTable("tb_equipes");
$equipesData = $manipula->getAllDataTable();

// Criar array associativo com ID => nome
$equipes = [];
foreach ($equipesData as $equipe) {
    $equipes[$equipe['id']] = $equipe['nome'];
}
?>

<head>
    <link rel="stylesheet" href="css/apppilotos.css">
</head>

<div class="container mt-5">
    <h2 class="text-center mb-4">Nossos Pilotos</h2>
    <div class="row justify-content-center">
        <?php foreach ($pilotos as $piloto): ?>
            <div class="col-sm-6 col-md-4 col-lg-3 d-flex justify-content-center">
                <div class="piloto-card">
                    <img src="<?= $piloto['url'] ?>" alt="Foto de <?= htmlspecialchars($piloto['nome']) ?>" class="piloto-img">
                    <div class="piloto-body">
                        <h5><?= htmlspecialchars($piloto['nome']) ?></h5>
                        <p class="text-muted">
                            <?= isset($equipes[$piloto['equipe_id']]) ? htmlspecialchars($equipes[$piloto['equipe_id']]) : 'Sem equipe' ?>
                        </p>
                    </div>
                </div>
            </div>
        <?php endforeach; ?>
    </div>
</div>