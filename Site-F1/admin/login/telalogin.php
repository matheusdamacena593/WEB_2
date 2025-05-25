<?php
?>

<html lang="pt-br">

<head>
    <meta charset="utf-8">
    <title>Login</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-SgOJa3DmI69IUzQ2PVdRZhwQ+dy64/BUtbMJw1MZ8t5HZApcHrRKUc4W0kG879m7" crossorigin="anonymous">
</head>

<body>

    <div class="container mt-5">
        <h1 class="text-center mb-5">Login</h1>
        <div class="row justify-content-center">
            <div class="col-md-4">
                <form method="post" action="login.php">
                    <div class="form-group row">
                        <label for="txtUsuario" class="col-sm-2 col-form-label">Usuário</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" name="txtUsuario" placeholder="Digite seu usuário">
                        </div>
                    </div>

                    <div class="form-group row mt-4">
                        <label for="txtSenha" class="col-sm-2 col-form-label">Senha</label>
                        <div class="col-sm-10">
                            <input type="password" class="form-control" name="txtSenha" placeholder="Digite sua senha">
                        </div>
                    </div>

                    <div class="mt-4 text-center">
                        <button type="submit" class="btn btn-primary">Enviar</button>
                        <button type="reset" class="btn btn-secondary">Limpar</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-k6d4wzSIapyDyv1kpU366/PK5hCdSbCRGRCMv+eplOQJWyd1fbcAu9OCUj5zNLiq"
        crossorigin="anonymous"></script>
</body>

</html>