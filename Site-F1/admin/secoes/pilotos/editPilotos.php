<?php

include_once("../classes/ManipulaDados.php");
$manipula = new ManipulaDados();
$manipula->setTable("tb_equipes");
$equipes = $manipula->getAllDataTable();

$manipula->setTable("tb_pilotos");
$manipula->setFieldPk("id");
$manipula->setValuePk($_GET['id']);
$piloto = $manipula->getData();

?>

<div class="container mt-5">
    <h1 class="text-center">Cadastro de Pilotos</h1>
    <div class="row justify-content-center">
        <div class="col-md-4">
            <form action="controllers/pilotos/editPilotoController.php" method="post" enctype="multipart/form-data">

                <input type="hidden" name="id" value="<?= htmlspecialchars($piloto['id']) ?>">

                <div class="form-group mt-3">
                    <label for="txtNome">Nome do Piloto</label>
                    <input type="text" name="txtNome" id="txtNome" class="form-control" value="<?= htmlspecialchars($piloto['nome']) ?>" required>
                </div>
                <div class="form-group mt-3">
                    <label for="txtVitorias">Vitórias</label>
                    <input type="number" name="txtVitorias" id="txtVitorias" class="form-control" value="<?= htmlspecialchars($piloto['vitorias']) ?>" required>
                </div>
                <div class="form-group mt-3">
                    <label for="txtPontos">Pontos</label>
                    <input type="number" name="txtPontos" id="txtPontos" class="form-control" value="<?= htmlspecialchars($piloto['pontos']) ?>" required>
                </div>
                <div class="form-group mt-3">
                    <label for="txtNacionalidade">Nacionalidade</label>
                    <input type="text" name="txtNacionalidade" id="txtNacionalidade" class="form-control" value="<?= htmlspecialchars($piloto['nacionalidade']) ?>" required>
                </div>
                <div class="form-group mt-3">
                    <label>Foto Atual</label>
                    <img src="../../images/<?= htmlspecialchars($piloto['url']) ?>" alt="Foto do Piloto" class="img-fluid mt-2">
                    <label for="txtUrl">Trocar Foto</label>
                    <input type="file" name="txtUrl" id="txtUrl" class="form-control">
                </div>
                <div class="form-group mt-3">
                    <label for="autor">Equipe</label>
                    <select name="txtEquipe" class="form-select text-center form-control-lg">
                        <option value="">-- Selecione --</option>
                        <?php foreach ($equipes as $equipe): ?>
                            <option value="<?= $equipe['id'] ?>" <?= $piloto['equipe_id'] == $equipe['id'] ? 'selected' : '' ?>>
                                <?= $equipe['nome'] ?>
                            </option>
                        <?php endforeach; ?>
                    </select>
                </div>

                <div class="mt-4 text-center">
                    <button type="submit" class="btn btn-primary">Salvar Alterações</button>
                    <a href="index.php?secao=pilotos" class="btn btn-secondary">Cancelar</a>
                </div>
            </form>
        </div>
    </div>
</div>