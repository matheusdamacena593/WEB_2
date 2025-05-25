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
        <form action="controllers/equipes/editEquipeController.php" method="post" enctype="multipart/form-data">
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
            <div class="form-group mt-3">
                    <label>Foto Atual</label>
                    <img src="../../<?= htmlspecialchars($equipe['url']) ?>" alt="Foto da Notícia" class="img-fluid mt-2 mb-3 d-block">

                    <label for="txtUrl">Trocar Foto</label>
                    <input type="file" name="txtUrl" id="txtUrl"class="form-control">
                </div>
            <div class="form-group">
                <label for="txtVitorias">Vitórias</label>
                <input type="number" name="txtVitorias" id="txtVitorias" class="form-control" value="<?= htmlspecialchars($equipe['vitorias']) ?>" required>
            </div>
            <div class="form-group">
                <label for="txtPontos">Pontos</label>
                <input type="number" name="txtPontos" id="txtPontos" class="form-control" value="<?= htmlspecialchars($equipe['pontos']) ?>" required>
            </div>
            <div class="mt-4 text-center">
                  <button type="submit" class="btn btn-primary">Salvar Alterações</button>
                    <a href="index.php?secao=equipes" class="btn btn-secondary">Cancelar</a>
            </div>
        </form>
        </div>
    </div>
</div>