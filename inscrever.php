<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sistema de estoque | Entrar</title>
    <link rel="stylesheet" href="./bootstrap.min.css">
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <?php

use Dom\Mysql;

        include "./nav.php";
        include "./conexao.php";

        if(isset($_POST['nome'])){
            $nome = mysqli_escape_string($conn,$_POST['nome']);
            $senha = mysqli_escape_string($conn,$_POST['senha']);
            $senha = password_hash($senha,PASSWORD_BCRYPT);

            $query = "insert into usuarios (nome_usuario,senha_usuario) values('$nome','$senha')";

            $res = mysqli_query($conn,$query);    
        }
    ?>
<form action="./inscrever.php" method="post">
    <div class="row mb-3">
      <label for="inputEmail3" class="col-sm-2 col-form-label">Nome</label>
      <div class="col-sm-10">
        <input type="text" class="form-control" id="inputEmail3" name="nome" required>
      </div>
    </div>
    <div class="row mb-3">
        <label for="inputPassword3" class="col-sm-2 col-form-label">Senha</label>
        <div class="col-sm-10">
        <input type="password" class="form-control" id="inputPassword3" name="senha" required>
      </div>
    </div>
    <button type="submit" class="btn btn-primary">Criar</button>
</form>
    </div>
    <script src="./bootstrap.bundle.min.js"></script>
</body>
</html>