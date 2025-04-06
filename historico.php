<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sistema estoque | Histórico</title>
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

        $query = "select vp.data_venda_produtos, sum(vp.valor_total) as total_vendido, group_concat(distinct p.nome_produto separator ', ') as produtos_vendidos from venda_produtos vp join produtos p on p.id_produto = vp.id_produto where p.id_usuario = '$id_usuario'
        group by vp.data_venda_produtos;";

        $res = mysqli_query($conn,$query);

        if($res){
            ?> 
                <div class="container">
                    <div class="row">
                        <div class="col-4">
                            <ul class="list-group mt-4">
                                <li class="list-group-item">
                                    <form action="">
                                        <div class="mt-2 mb-3">
                                            <h5>Pesquisa histórico:</h2>
                                        </div>
                                        <div class="row">
                                            <div class="col-7">
                                                <input class="form-control me-2" type="search" placeholder="Pesquisar data" aria-label="Search" name="pesquisa" required>
                                            </div>
                                            <div class="offset-1 col-4">
                                                <button type="submit" class="btn btn-success">Pesquisar</button>
                                            </div>
                                        </div>
                                    </form>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <table class="table table-striped table-hover mt-5">
                        <thead>
                            <tr>
                                <th>Data da venda</th>
                                <th>Produtos vendidos</th>
                                <th>Valor total</th>
                            </tr>
                        </thead>
                        <tbody>
                        <?php
                            while($dados = mysqli_fetch_array($res)){
                                ?>
                                    <tr>
                                        <td><?php echo date('d/m/y',strtotime($dados['data_venda_produtos']))?></td>
                                        <td><?php echo $dados['produtos_vendidos']?></td>
                                        <td><?php echo $dados['total_vendido']?></td>
                                    </tr>
                                <?php
                            }
                        ?>
                        </tbody>
                    </table> 
                </div>
            <?php
        }
    ?>
    <script src="./bootstrap.bundle.min.js"></script>
</body>
</html>