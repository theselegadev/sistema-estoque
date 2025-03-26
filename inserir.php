<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sistema de estoque | Inserir</title>
    <link rel="stylesheet" href="./bootstrap.min.css">
</head>
<body>
    <?php
        include "./navbars/nav_sistema.php";
        session_start();

        if(empty($_SESSION['logado'])){
            header("Location: ./index.php");
        }
    ?>
    <div class="container">
    <form action="" method="post" class="mt-5">
        <div class="mb-4">
            <h3>Inserir produto:</h3>
        </div>
        <div class="input-group mb-3">
            <span class="input-group-text" id="basic-addon1">Nome:</span>
            <input type="text" class="form-control" placeholder="Nome" aria-label="Username" aria-describedby="basic-addon1" required>
        </div>
        <div class="input-group mb-3">
            <span class="input-group-text" id="basic-addon1">Descrição:</span>
            <input type="text" class="form-control" placeholder="Descrição" aria-label="Username" aria-describedby="basic-addon1" required>
        </div>
        <div class="input-group mb-3">
            <span class="input-group-text" id="basic-addon1">Quantidade:</span>
            <input type="number" class="form-control" placeholder="Quantidade" aria-label="Username" aria-describedby="basic-addon1" required>
        </div>
        <div class="input-group mb-3">
            <span class="input-group-text" id="basic-addon1">Preço:</span>
            <input type="number" class="form-control" placeholder="Preço" aria-label="Username" aria-describedby="basic-addon1" step="0.01" required>
        </div>
        <button type="submit" class="btn btn-success">Inserir</button>
    </form>
    </div>
    <script src="./bootstrap.bundle.min.js"></script>
</body>
</html>