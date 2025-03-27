<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sistema estoque | Atualizar</title>
    <link rel="stylesheet" href="./bootstrap.min.css">
</head>
<body>
    <?php
        include "./navbars/nav_sistema.php";
    ?>
        <div class="container">
        <form action="./atualizar.php" method="post" class="mt-5">
            <div class="mb-4">
                <h3>Atualizar produto:</h3>
            </div>
            <div class="input-group mb-3">
                <span class="input-group-text" id="basic-addon1">Id:</span>
                <input type="text" class="form-control" aria-label="Username" aria-describedby="basic-addon1" name="nome" required disabled value="<?php echo $_GET['id'];?>">
            </div>
            <div class="input-group mb-3">
                <span class="input-group-text" id="basic-addon1">Nome:</span>
                <input type="text" class="form-control" placeholder="Nome" aria-label="Username" aria-describedby="basic-addon1" name="nome" required>
            </div>
            <div class="input-group mb-3">
                <span class="input-group-text" id="basic-addon1">Descrição:</span>
                <input type="text" class="form-control" placeholder="Descrição" aria-label="Username" aria-describedby="basic-addon1" name="descricao" required>
            </div>
            <div class="input-group mb-3">
                <span class="input-group-text" id="basic-addon1">Quantidade:</span>
                <input type="number" class="form-control" placeholder="Quantidade" aria-label="Username" aria-describedby="basic-addon1" name="quantidade" required>
            </div>
            <div class="input-group mb-3">
                <span class="input-group-text" id="basic-addon1">Preço:</span>
                <input type="number" class="form-control" placeholder="Preço" aria-label="Username" aria-describedby="basic-addon1" step="0.01" name="preco" required>
            </div>
            <button type="submit" class="btn btn-success">Atualizar</button>
        </form>
        </div>
    <script src="./bootstrap.bundle.min.js"></script>
</body>
</html>