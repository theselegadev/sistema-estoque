<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sistema de estoque | Home</title>
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
        $id_usuario = $_SESSION['id_usuario'];

        if(isset($_GET['produto'])){
            ?>
            <div class="container">
                <div class="alert alert-success alert-dismissible fade show mt-4" role="alert">
                    <?php echo $_GET['produto']?>   
                    <a href="./sistema.php"><button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button></a>
                </div>
            </div>
            <?php
        }
    ?>
    <?php
        if(isset($_GET['excluir'])){
            ?>
            <div class="container">
                <div class="alert alert-success alert-dismissible fade show mt-4" role="alert">
                    <?php echo $_GET['excluir']?>   
                    <a href="./sistema.php"><button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button></a>
                </div>
            </div>
            <?php
        }
        if(isset($_GET['atualizou'])){
            ?>
            <div class="container">
                <div class="alert alert-success alert-dismissible fade show mt-4" role="alert">
                    <?php echo $_GET['atualizou']?>   
                    <a href="./sistema.php"><button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button></a>
                </div>
            </div>
            <?php
        }
        if(isset($_GET['venda'])){
            ?>
            <div class="container">
                <div class="alert alert-success alert-dismissible fade show mt-4" role="alert">
                    <?php echo $_GET['venda']?>   
                    <a href="./sistema.php"><button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button></a>
                </div>
            </div>
            <?php
        }
        if(isset($_GET['alerta'])){
            ?>
            <div class="container">
                <div class="alert alert-danger alert-dismissible fade show mt-4" role="alert">
                    <?php echo $_GET['alerta']?>   
                    <a href="./sistema.php"><button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button></a>
                </div>
            </div>
            <?php
        }
        if(isset($_GET['erro-pesquisa'])){
            ?>
            <div class="container">
                <div class="alert alert-danger alert-dismissible fade show mt-4" role="alert">
                    <?php echo $_GET['erro-pesquisa']?>   
                    <a href="./sistema.php"><button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button></a>
                </div>
            </div>
            <?php
        }
    ?>
    <div class="container">
        <table class="table table-striped table-hover mt-5">
            <thead>
                <tr>
                    <th>#Id</th>
                    <th>Nome:</th>
                    <th>Descricao:</th>
                    <th>Quantidade:</th>
                    <th>Preço:</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                <?php
                    $query = "select * from produtos where id_usuario = '$id_usuario'";

                    $res = mysqli_query($conn,$query);
            
                    while($dados = mysqli_fetch_array($res)){
                        ?>
                            <tr>
                                <td><?php echo $dados['ID_PRODUTO']?></td>
                                <td><?php echo $dados['NOME_PRODUTO']?></td>
                                <td><?php echo $dados['DESCRICAO_PRODUTO']?></td>
                                <td><?php echo $dados['QUANTIDADE']?></td>
                                <td><?php echo $dados['PRECO_PRODUTO']?></td>
                                <td>
                                    <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#exampleModal">Deletar</button>
                                    <a href="./atualizar.php?id=<?php echo $dados['ID_PRODUTO']?>" class="btn btn-primary">Atualizar</a>
                                    <a href="./venda.php?id=<?php echo $dados['ID_PRODUTO']?>" class="btn btn-success">Vender</a>
                                </td>
                            </tr>
                            <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                <div class="modal-header" style="background-color: rgb(240, 238, 238);">
                                    <h1 class="modal-title fs-5" id="exampleModalLabel">Atenção</h1>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    Atenção tem certeza que deseja deletar esse item?
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                                    <a href="./deletar.php?id=<?php echo $dados['ID_PRODUTO']?>"><button type="button" class="btn btn-danger" data-bs-dismiss="modal">Deletar</button></a>
                                </div>
                                </div>
                            </div>
                            </div>
                        <?php
                    }
                ?>
            </tbody>
        </table>
    </div>
    <script src="./bootstrap.bundle.min.js"></script>
</body>
</html>