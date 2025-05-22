<?php

include_once("../classes/ManipulaDados.php");
$manipula = new ManipulaDados();
$manipula->setTable("tb_equipes");
$equipes = $manipula->getAllDataTable();

?>

<div class="container mt-5">
    <h1 class="text-center">Cadastro de Pilotos</h1>
    <div class="row justify-content-center">
        <div class="col-md-4">
            <form action="controllers/pilotos/cadPilotoController.php" method="post" enctype="multipart/form-data">
                <div class="form-group">
                    <label for="txtNome">Nome do Piloto</label>
                    <input type="text" name="txtNome" id="txtNome" class="form-control" required>
                </div>
                <div class="form-group">
                    <label for="txtVitorias">Vitórias</label>
                    <input type="number" name="txtVitorias" id="txtVitorias" class="form-control" required>
                </div>
                <div class="form-group">
                    <label for="txtPontos">Pontos</label>
                    <input type="number" name="txtPontos" id="txtPontos" class="form-control" required>
                </div>
                <div class="form-group">
                    <label for="txtNacionalidade">Nacionalidade</label>
                    <input type="text" name="txtNacionalidade" id="txtNacionalidade" class="form-control" required>
                </div>
                <div class="form-group">
                    <label for="txtUrl">Url</label>
                    <input type="file" name="txtUrl" id="txtUrl" class="form-control" required>
                </div>
                <div class="form-group">
                    <label for="autor">Equipe</label>
                    <select name="txtEquipe" class="form-select text-center form-control-lg">
                        <?php foreach ($equipes as $equipe): ?>
                            <option value="<?= $equipe['id'] ?>"><?= $equipe['nome'] ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>

                <div class="mt-4 text-center">
                    <button type="submit" class="btn btn-primary">Enviar</button>
                    <button type="reset" class="btn btn-secondary">Limpar</button>
                </div>
            </form>
        </div>
    </div>
</div>