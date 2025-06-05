<?php

?>

<div class="container mt-5">
    <h1 class="text-center">Cadastro de Corridas</h1>
    <div class="row justify-content-center">
        <div class="col-md-4">
        <form action="controllers/corridas/cadCorridaController.php" method="post" enctype="multipart/form-data">
            <div class="form-group">
                <label for="txtPista">Nome da corrida</label>
                <input type="text" name="txtPista" id="txtPista" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="txtLocal">Local</label>
                <input type="text" name="txtLocal" id="txtLocal" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="txtData">Data</label>
                <input type="date" name="txtData" id="txtData" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="txtUrl">Foto</label>
                <input type="file" name="txtUrl" id="txtUrl" class="form-control" required>
            </div>
            <div class="mt-4 text-center">
                <button type="submit" class="btn btn-primary">Enviar</button>
                <button type="reset" class="btn btn-secondary">Limpar</button>
            </div>
        </form>
        </div>
    </div>
</div>