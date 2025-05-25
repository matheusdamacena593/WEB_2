<?php
include_once("../classes/ManipulaDados.php");

$recebeNoticias = new ManipulaDados();
$recebeNoticias->setTable("tb_noticias");
$recebeNoticias->setFieldPk("id");
$recebeNoticias->setValuePk($_GET['id']);
$noticia = $recebeNoticias->getData();

?>

<div class="container mt-5">
    <h1 class="text-center">Editar Notícia</h1>

    <div class="row justify-content-center">
        <div class="col-md-4">
            <form method="post" action="./controllers/noticias/editNoticiaController.php" enctype="multipart/form-data">
                <!-- Campo oculto com o ID -->
                <input type="hidden" name="id" value="<?= htmlspecialchars($noticia['id']) ?>">

                <div class="form-group">
                    <label for="titulo">Título</label>
                    <input type="text" name="titulo" class="form-control" value="<?= htmlspecialchars($noticia['titulo']) ?>" required>
                </div>

                <div class="form-group">
                    <label for="descricao">Descrição</label>
                    <textarea class="form-control" name="descricao" required rows="3"><?= htmlspecialchars($noticia['descricao']) ?></textarea>
                </div>

                <div class="form-group mt-3">
                    <label>Foto Atual</label>
                    <img src="../../<?= htmlspecialchars($noticia['url']) ?>" alt="Foto da Notícia" class="img-fluid mt-2 mb-3 d-block">

                    <label for="arquivo">Trocar Foto</label>
                    <input type="file" name="arquivo" id="arquivo"class="form-control">
                </div>

                <div class="form-group">
                    <label for="data">Data da notícia</label>
                    <input type="date" name="data" class="form-control" value="<?= htmlspecialchars($noticia['data']) ?>" required>
                </div>

                <div class="form-group">
                    <label for="autor">Autor</label>
                    <select name="autor" class="form-select text-center form-control-lg">
                        <option value="">-- Selecione --</option>
                        <?php
                        $autores = [
                            "damacena" => "Matheus Damacena",
                            "bryan" => "Dereck Bryan",
                            "calazans" => "Bruno Calazans",
                            "maciel" => "Daniel Maciel",
                            "bobson" => "Bobson do WebSexo"
                        ];
                        foreach ($autores as $valor => $nome) {
                            $selected = ($noticia['autor'] === $valor) ? "selected" : "";
                            echo "<option value=\"$valor\" $selected>$nome</option>";
                        }
                        ?>
                    </select>
                </div>

                <div class="mt-4 text-center">
                    <button type="submit" class="btn btn-primary">Salvar Alterações</button>
                    <a href="index.php?secao=noticias" class="btn btn-secondary">Cancelar</a>
                </div>
            </form>
        </div>
    </div>
</div>