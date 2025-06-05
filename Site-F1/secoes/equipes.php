<?php
include_once("classes/ManipulaDados.php");

$manipula = new ManipulaDados();
$manipula->setTable("tb_equipes");
$equipes = $manipula->getAllDataTable();
?>

<head>
    <link rel="stylesheet" href="css/appequipes.css" />
</head>

<div class="container">
    <h1 class="title">Equipes</h1>
    <div class="cards">
        <?php foreach ($equipes as $equipe): ?>
            <div class="card">
                <img src="images/<?= htmlspecialchars($equipe['url']) ?>" alt="<?= htmlspecialchars($equipe['nome']) ?>" class="card-img" />
                <h2 class="card-name"><?= htmlspecialchars($equipe['nome']) ?></h2>
                <p class="card-info"><?= htmlspecialchars($equipe['nacionalidade']) ?></p>
            </div>
        <?php endforeach; ?>
    </div>
</div>
