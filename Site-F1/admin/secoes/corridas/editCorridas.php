<?php
include_once("../classes/ManipulaDados.php");

$recebeCorridas = new ManipulaDados();
$recebeCorridas->setTable("tb_corridas");
$recebeCorridas->setFieldPk("id");
$recebeCorridas->setValuePk($_GET['id']);
$corrida = $recebeCorridas->getData();

?>

<div class="container mt-5">
    <h1 class="text-center">Edição de Corridas</h1>
    <div class="row justify-content-center">
        <div class="col-md-4">
            <form action="controllers/corridas/editCorridaController.php" method="post" enctype="multipart/form-data">
                <input type="hidden" name="id" value="<?= htmlspecialchars($corrida['id']) ?>">

                <div class="form-group">
                    <label for="txtPista">Nome da Pista</label>
                    <input type="text" name="txtPista" id="txtPista" value="<?= htmlspecialchars($corrida['pista']) ?>"
                        class="form-control" required>
                </div>
                <div class="form-group">
                    <label for="txtLocal">Local</label>
                    <input type="text" name="txtLocal" id="txtLocal" value="<?= htmlspecialchars($corrida['local']) ?>"
                        class="form-control" required>
                </div>
                <div class="form-group">
                    <label for="txtData">Data</label>
                    <input type="date" name="txtData" id="txtData" value="<?= htmlspecialchars($corrida['data']) ?>"
                        class="form-control" required>
                </div>
                <div class="form-group mt-3">
                    <label>Foto Atual</label>
                    <img src="../../images/<?= htmlspecialchars($corrida['url']) ?>" alt="Foto da Corrida"
                        class="img-fluid mt-2 mb-3 d-block" />

                    <label for="txtUrl">Trocar Foto</label>
                    <input type="file" name="txtUrl" id="txtUrl" class="form-control">
                </div>
                <div class="mt-4 text-center">
                    <button type="submit" class="btn btn-primary">Salvar Alterações</button>
                    <a href="index.php?secao=equipes" class="btn btn-secondary">Cancelar</a>
                </div>
            </form>
        </div>
    </div>
</div>