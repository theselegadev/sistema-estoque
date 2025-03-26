<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sistema de estoque | Entrar</title>
    <link rel="stylesheet" href="./bootstrap.min.css">
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <?php
        include "./navbars/nav.php";
        include "./conexao.php";
        session_start();

        if(isset($_POST['login'])){
            $login = mysqli_escape_string($conn,$_POST['login']);
            $senha = mysqli_escape_string($conn,$_POST['senha']);

            $query = "select * from usuarios where nome_usuario = '$login'";

            $res = mysqli_query($conn,$query);

            if(mysqli_num_rows($res) > 0){
                $dados = mysqli_fetch_array($res);
                
                if(password_verify($senha,$dados['SENHA_USUARIO'])){
                    $_SESSION['logado'] = true;
                    header("Location: ./sistema.php");
                }else{
                    header("Location: ./entrar.php?falhou=Senha incorreta!");
                }
            }else{
                header("Location: ./entrar.php?falhou=Usuário inexistente!");
            }
        }
    ?>
    <?php
        if(isset($_GET['falhou'])){
            ?>
                <div class="container">
                    <div class="alert alert-danger alert-dismissible fade show mt-4" role="alert">
                        <?php echo $_GET['falhou']?>   
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                </div>
            <?php
        }
    ?>
    <form action="./entrar.php" method="post">
        <h3>Entrar:</h3>
    <div class="row mb-3">
      <label for="inputEmail3" class="col-sm-2 col-form-label">Login:</label>
      <div class="col-sm-10">
        <input type="text" class="form-control" id="inputEmail3" name="login" required>
      </div>
    </div>
    <div class="row mb-3">
        <label for="inputPassword3" class="col-sm-2 col-form-label">Senha</label>
        <div class="col-sm-10">
        <input type="password" class="form-control" id="inputPassword3" name="senha" required>
      </div>
    </div>
    <button type="submit" class="btn btn-success">Entrar</button>
</form>
    <script src="./bootstrap.bundle.min.js"></script>
</body>
</html>