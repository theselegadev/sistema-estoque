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

        if(isset($_GET['alerta'])){
            ?>
            <div class="container">
                <div class="alert alert-danger alert-dismissible fade show mt-4" role="alert">
                    <?php echo $_GET['alerta']?>   
                    <a href="./venda.php"><button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button></a>
                </div>
            </div>
            <?php
        }

        if(isset($_POST['produto'])){
            $id_usuario = $_SESSION['id_usuario'];
            $produto = mysqli_escape_string($conn,$_POST['produto']);

            $query = "select * from produtos where nome_produto = '$produto' and id_usuario = '$id_usuario' or id_produto = '$produto' and id_usuario = '$id_usuario'";

            $res = mysqli_query($conn,$query);

            if(mysqli_num_rows($res) < 1){
                header("Location: ./venda.php?alerta=Não há esse produto em estoque");
            }else if(mysqli_num_rows($res) > 1){
                header("Location: ./venda.php?alerta=Há mais de um produto com esse nome, insira o id do produto!");
            }else{
                $dados = mysqli_fetch_array($res);
                $quantidade = mysqli_escape_string($conn,$_POST['quantidade']);

                if($quantidade > $dados['QUANTIDADE']){
                    header("Location: ./venda.php?alerta=Quantidade maior do que o estoque!");
                }else{
                    $query = "update produtos set quantidade = (select quantidade from produtos where nome_produto = '$produto' and id_usuario = '$id_usuario' or id_produto = '$produto') - '$quantidade' where nome_produto = '$produto' and id_usuario = '$id_usuario' or id_produto = '$produto'";

                    $res = mysqli_query($conn,$query);

                    if($res){
                        $query = "select id_produto from produtos where id_produto = '$produto' or nome_produto = '$produto'";

                        $res = mysqli_query($conn,$query);

                        $dados = mysqli_fetch_array($res);

                        $produto = $dados['id_produto'];
                        $quantidade_vendida = mysqli_escape_string($conn,$_POST['quantidade']);
                        $data = mysqli_escape_string($conn,$_POST['data']);

                        $query = "insert into venda_produtos (id_produto,quantidade_venda_produtos,data_venda_produtos) values ('$produto','$quantidade_vendida','$data')";

                        $res = mysqli_query($conn,$query);

                        if($res){
                            header("Location: ./sistema.php?venda=Venda feita com sucesso!");
                        }
                    }
                }
            }
        }
    ?>
    <div class="container">
        <div class="row">
            <div class="col-2"></div>
            <div class="col-7">
                <form action="./venda.php" method="post">
                    <div class="mt-5 mb-4">
                        <h2>Vender produto</h2>
                    </div>
                    <div class="input-group mb-3">
                        <span class="input-group-text" id="basic-addon1">Produto:</span>
                        <input type="text" class="form-control" placeholder="Nome ou Id do produto:" aria-label="Username" aria-describedby="basic-addon1" name="produto" required>
                    </div>
                    <div class="input-group mb-3">
                        <span class="input-group-text" id="basic-addon1">Quantidade:</span>
                        <input type="number" class="form-control" placeholder="Quantidade vendida:" aria-label="Username" aria-describedby="basic-addon1" name="quantidade" required>
                    </div>
                    <div class="input-group mb-3">
                        <span class="input-group-text" id="basic-addon1">Data:</span>
                        <input type="date" class="form-control" placeholder="Data da venda:" aria-label="Username" aria-describedby="basic-addon1" name="data" required>
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