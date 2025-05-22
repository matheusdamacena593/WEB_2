<?php
include_once("../classes/ManipulaDados.php");

$recebeEquipes = new ManipulaDados();
$recebeEquipes->setTable("tb_equipes");
$recebeEquipes->setFieldPk("id");
$recebeEquipes->setValuePk($_GET['id']);
$equipe = $recebeEquipes->getData();

?>

<div class="container mt-5">
    <h1 class="text-center">Cadastro de Equipes</h1>
    <div class="row justify-content-center">
        <div class="col-md-4">
        <form action="controllers/equipes/editEquipeController.php" method="post">
            <input type="hidden" name="id" value="<?= htmlspecialchars($equipe['id']) ?>">

            <div class="form-group">
                <label for="txtNome">Nome da Equipe</label>
                <input type="text" name="txtNome" id="txtNome" value="<?= htmlspecialchars($equipe['nome']) ?>" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="txtFormotor">Fornecedor do Motor</label>
                <input type="text" name="txtFormotor" id="txtFormotor" value="<?= htmlspecialchars($equipe['formotor']) ?>" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="txtNacionalidade">Nacionalidade</label>
                <input type="text" name="txtNacionalidade" id="txtNacionalidade" value="<?= htmlspecialchars($equipe['nacionalidade']) ?>" class="form-control" required>
            </div>
            <div class="mt-4 text-center">
                <button type="submit" class="btn btn-primary">Enviar</button>
                <button type="reset" class="btn btn-secondary">Limpar</button>
            </div>
        </form>
        </div>
    </div>
</div>