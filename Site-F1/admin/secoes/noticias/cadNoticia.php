<?php
?>

<div class="container mt-5">
    <h1 class="text-center">Criar Notícia</h1>

    <div class="row justify-content-center">
        <div class="col-md-4">
            <form method="post" action="controllers/CadNoticiaController.php" enctype="multipart/form-data">
                <div class="form-group">
                    <label for="titulo">Título</label>
                    <input type="text" name="titulo" class="form-control" placeholder="Título" required>
                </div>

                <div class="form-group">
                    <label for="descricao">Descrição</label>
                    <textarea class="form-control" name="descricao" required rows="3"></textarea>
                </div>

                <div class="form-group">
                    <label for="arquivo">Arquivo</label>
                    <input type="file" name="arquivo" id="arquivo"class="form-control" required>
                </div>

                <div class="form-group">
                    <label for="data">Data da notícia</label>
                    <input type="date" name="data" class="form-control" required>
                </div>

                <div class="form-group">
                    <label for="autor">Autor</label>
                    <select name="autor" class="form-select text-center form-control-lg">
                        <option value="">-- Selecione --</option>
                        <option value="damacena">Matheus Damacena</option>
                        <option value="bryan">Dereck Bryan</option>
                        <option value="calazans">Bruno Calazans</option>
                        <option value="maciel">Daniel Maciel</option>
                        <option value="bobson">Bobson do WebSexo</option>
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
