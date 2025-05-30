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
        $id_usuario = $_SESSION['id_usuario'];

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
        if(isset($_GET['id'])){
            $id = $_GET['id'];
        }
        
        $query = "select nome_produto from produtos where id_produto = '$id' and id_usuario = '$id_usuario'";
        $res = mysqli_query($conn,$query);

        if($res){
            $dados = mysqli_fetch_array($res);
        }

        

        if(isset($_POST['quantidade'])){
            $id = $_POST['id'];
            $quantidade = mysqli_escape_string($conn,$_POST['quantidade']);
            $data = mysqli_escape_string($conn,$_POST['data']);
            $query = "select quantidade, preco_produto from produtos where id_produto = '$id' and id_usuario = '$id_usuario'";

            $res = mysqli_query($conn,$query);

            if($res){
                $dados = mysqli_fetch_array($res);
                $preco_produto = $dados['preco_produto'];
                $quant_db = $dados['quantidade'];

                if($quant_db < $quantidade){
                    header("Location: ./sistema.php?alerta=Quantidade maior do que há no estoque!");
                }else{
                    $query = "update produtos set quantidade = ('$quant_db' - '$quantidade') where id_produto = '$id'";
                    $res = mysqli_query($conn,$query);

                    if($res){
                        $valor_total = $quantidade * $preco_produto;
                        $query = "insert into venda_produtos (id_produto,quantidade_venda_produtos,data_venda_produtos, valor_total) values ('$id', '$quantidade' , '$data', '$valor_total')";

                        $res = mysqli_query($conn,$query);

                        if($res){
                            header("Location: ./sistema.php?venda=Venda realizada com sucesso!");
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
                        <span class="input-group-text" id="basic-addon1">Id:</span>
                        <input type="number" class="form-control" aria-label="Username" aria-describedby="basic-addon1" name="id" readonly value="<?php echo $id?>">
                    </div>
                    <div class="input-group mb-3">
                        <span class="input-group-text" id="basic-addon1">Produto:</span>
                        <input type="text" class="form-control" aria-label="Username" aria-describedby="basic-addon1" name="produto" value="<?php echo $dados['nome_produto']?>" readonly>
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