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
        include "./conexao.php";

        session_start();

        if(empty($_SESSION['logado'])){
            header("Location: ./index.php");
        }

        if(isset($_POST['nome'])){
            $nome = mysqli_escape_string($conn,$_POST['nome']);
            $descricao = mysqli_escape_string($conn,$_POST['descricao']);
            $quantidade = mysqli_escape_string($conn,$_POST['quantidade']);
            $preco = mysqli_escape_string($conn,$_POST['preco']);

            $id_usuario = $_SESSION['id_usuario'];

            $query = "insert into produtos (nome_produto,descricao_produto,quantidade,preco_produto,id_usuario) values ('$nome','$descricao','$quantidade','$preco','$id_usuario')";

            $res = mysqli_query($conn,$query);

            if($res){
                header("Location: ./sistema.php?produto=Produto inserido com sucesso!");
            }else{
                header("Location: ./inserir.php?falhou=Inserção do produto falhou!");
            }
        }
    ?>
    <div class="container">
        <?php
            if(isset($_GET['falhou'])){
                ?>
                <div class="alert alert-danger alert-dismissible fade show mt-4" role="alert">
                    <?php echo $_GET['falhou']?>   
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
                <?php
            }
        ?>
        <form action="./inserir.php" method="post" class="mt-5">
            <div class="mb-4">
                <h3>Inserir produto:</h3>
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
            <button type="submit" class="btn btn-success">Inserir</button>
        </form>
    </div>
    <script src="./bootstrap.bundle.min.js"></script>
</body>
</html>