<?php

?>

<div class="container mt-5">
    <h1 class="text-center">Cadastro de Equipes</h1>
    <div class="row justify-content-center">
        <div class="col-md-4">
        <form action="controllers/equipes/cadEquipeController.php" method="post">
            <div class="form-group">
                <label for="txtNome">Nome da Equipe</label>
                <input type="text" name="txtNome" id="txtNome" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="txtFormotor">Fornecedor do Motor</label>
                <input type="text" name="txtFormotor" id="txtFormotor" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="txtNacionalidade">Nacionalidade</label>
                <input type="text" name="txtNacionalidade" id="txtNacionalidade" class="form-control" required>
            </div>
            <div class="mt-4 text-center">
                <button type="submit" class="btn btn-primary">Enviar</button>
                <button type="reset" class="btn btn-secondary">Limpar</button>
            </div>
        </form>
        </div>
    </div>
</div>