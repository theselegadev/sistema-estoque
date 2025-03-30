<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sistema estoque | Painel de vendas</title>
    <link rel="stylesheet" href="./bootstrap.min.css">
</head>
<body>
    <?php
        include "./navbars/nav_sistema.php";
        include "./conexao.php";
        session_start();

        if(empty($_SESSION['logado'])){
            header("Location: ./index.php");
        }
    ?>
    <div class="container">
        <div class="row">
            <div class="col-2"></div>
            <div class="col-7">
                <form action="">
                    <div class="mt-5 mb-4">
                        <h2>Vender produto</h2>
                    </div>
                    <div class="input-group mb-3">
                        <span class="input-group-text" id="basic-addon1">Produto:</span>
                        <input type="text" class="form-control" placeholder="Nome ou Id do produto:" aria-label="Username" aria-describedby="basic-addon1" name="produto" required>
                    </div>
                    <div class="input-group mb-3">
                        <span class="input-group-text" id="basic-addon1">Quantidade:</span>
                        <input type="text" class="form-control" placeholder="Quantidade vendida:" aria-label="Username" aria-describedby="basic-addon1" name="quantidade" required>
                    </div>
                    <div class="input-group mb-3">
                        <span class="input-group-text" id="basic-addon1">Data:</span>
                        <input type="text" class="form-control" placeholder="Data da venda:" aria-label="Username" aria-describedby="basic-addon1" name="data" required>
                    </div>
                    <button type="submit" class="btn btn-success">Vender</button>
                </form>
            </div>
            <div class="col-2"></div>
        </div>
    </div>
    <script src="./bootstrap.bundle.min.js"></script>
</body>
</html>