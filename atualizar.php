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
        include "./conexao.php";
        session_start();

        if(empty($_SESSION['logado'])){
            header("Location: ./index.php");
        }

        if(isset($_GET['id'])){
            $id = $_GET['id'];

            $id_usuario = $_SESSION['id_usuario'];

            $query = "select * from produtos where id_produto = '$id' and id_usuario = '$id_usuario'";

            $res = mysqli_query($conn,$query);

            $dados = mysqli_fetch_array($res);
        }
        
        if(isset($_POST['nome'])){
            $id = $_POST['id'];
            $nome = mysqli_escape_string($conn,$_POST['nome']);
            $descricao = mysqli_escape_string($conn,$_POST['descricao']);
            $quantidade = mysqli_escape_string($conn,$_POST['quantidade']);
            $preco = mysqli_escape_string($conn,$_POST['preco']);

            $id_usuario = $_SESSION['id_usuario'];

            $query = "update produtos set nome_produto = '$nome', descricao_produto = '$descricao', quantidade = '$quantidade', preco_produto = '$preco' where id_produto = '$id' and id_usuario = '$id_usuario'";

            $res = mysqli_query($conn,$query);

            if($res){
                header("Location: ./sistema.php?atualizou=Atualizado com sucesso!");
            }else{
                header("Location: ./atualizar.php?erro=Atualização falhou!");
            }
        }
    ?>
        <div class="container">
        <form action="./atualizar.php" method="post" class="mt-5">
            <div class="mb-4">
                <h3>Atualizar produto:</h3>
            </div>
            <div class="input-group mb-3">
                <span class="input-group-text" id="basic-addon1">Id:</span>
                <input type="text" class="form-control" aria-label="Username" aria-describedby="basic-addon1" required readonly name="id" value="<?php echo $dados['ID_PRODUTO'];?>">
            </div>
            <div class="input-group mb-3">
                <span class="input-group-text" id="basic-addon1">Nome:</span>
                <input type="text" class="form-control" placeholder="Nome" aria-label="Username" aria-describedby="basic-addon1" name="nome" required value="<?php echo $dados['NOME_PRODUTO']?>">
            </div>
            <div class="input-group mb-3">
                <span class="input-group-text" id="basic-addon1">Descrição:</span>
                <input type="text" class="form-control" placeholder="Descrição" aria-label="Username" aria-describedby="basic-addon1" name="descricao" required value="<?php echo $dados['DESCRICAO_PRODUTO']?>">
            </div>
            <div class="input-group mb-3">
                <span class="input-group-text" id="basic-addon1">Quantidade:</span>
                <input type="number" class="form-control" placeholder="Quantidade" aria-label="Username" aria-describedby="basic-addon1" name="quantidade" required value="<?php echo $dados['QUANTIDADE']?>">
            </div>
            <div class="input-group mb-3">
                <span class="input-group-text" id="basic-addon1">Preço:</span>
                <input type="number" class="form-control" placeholder="Preço" aria-label="Username" aria-describedby="basic-addon1" step="0.01" name="preco" required value="<?php echo $dados['PRECO_PRODUTO']?>">
            </div>
            <button type="submit" class="btn btn-success">Atualizar</button>
        </form>
        </div>
    <script src="./bootstrap.bundle.min.js"></script>
</body>
</html>