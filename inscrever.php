<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sistema de estoque | Inscrever-se</title>
    <link rel="stylesheet" href="./bootstrap.min.css">
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <?php
        include "./navbars/nav.php";
        include "./conexao.php";
        session_start();

        if(isset($_POST['nome'])){
            $nome = mysqli_escape_string($conn,$_POST['nome']);
            $senha = mysqli_escape_string($conn,$_POST['senha']);
            $senha = password_hash($senha,PASSWORD_BCRYPT);

            $query = "select * from usuarios where nome_usuario = '$nome'";

            $res = mysqli_query($conn,$query);

            if(mysqli_num_rows($res)>0){
              header("Location: ./inscrever.php?erro=Já tem um usuário com esse nome!");
            }else{
              $query = "insert into usuarios (nome_usuario,senha_usuario) values('$nome','$senha')";

              $res = mysqli_query($conn,$query);

              if($res){
                $query = "select id_usuario from usuarios where nome_usuario = '$nome'";

                $res = mysqli_query($conn,$query);
                $dados = mysqli_fetch_array($res);
                $_SESSION['id_usuario'] = $dados['id_usuario'];
                header("Location: ./sistema.php");
                $_SESSION['logado'] = true;
              }else{
                header("Location: ./inscrever.php?falha=Falhou! Sua criação de conta falhou");
              }
            } 
        }
    ?>
<?php 
if(isset($_GET["falha"])){
  ?>
  <div class="container">
      <div class="alert alert-danger alert-dismissible fade show mt-4" role="alert">
          <?php echo $_GET['falha']?>   
          <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
      </div>
  </div>
<?php
}

if(isset($_GET['erro'])){
  ?>
    <div class="container">
      <div class="alert alert-warning alert-dismissible fade show mt-4" role="alert">
          <?php echo $_GET['erro']?>   
          <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
      </div>
  </div>
  <?php
}
?>


<form action="./inscrever.php" method="post">
  <h3>Criar conta:</h3>
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