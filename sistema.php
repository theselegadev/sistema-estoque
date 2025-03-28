<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sistema de estoque | Home</title>
    <link rel="stylesheet" href="./bootstrap.min.css">
    <link rel="stylesheet" href="modal.css">
</head>
<body>
    <?php
        include "./navbars/nav_sistema.php";
        include "./conexao.php";
        session_start();
        
        if(empty($_SESSION['logado'])){
            header("Location: ./index.php");
        }

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
                    <th>Nome:</th>
                    <th>Descricao:</th>
                    <th>Quantidade:</th>
                    <th>Preço:</th>
                    <th></th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                <?php
                    $id_usuario = $_SESSION['id_usuario'];

                    $query = "select * from produtos where id_usuario = '$id_usuario'";

                    $res = mysqli_query($conn,$query);
            
                    while($dados = mysqli_fetch_array($res)){
                        ?>
                            <tr>
                                <td><?php echo $dados['NOME_PRODUTO']?></td>
                                <td><?php echo $dados['DESCRICAO_PRODUTO']?></td>
                                <td><?php echo $dados['QUANTIDADE']?></td>
                                <td><?php echo $dados['PRECO_PRODUTO']?></td>
                                <td>
                                    <button class="btn btn-danger" id="btn-deletar">Deletar</button>
                                    <a href="./atualizar.php?id=<?php echo $dados['ID_PRODUTO']?>" class="btn btn-success">Atualizar</a>
                                </td>
                            </tr>
                            <div class="modal-delete" id="modal-delete">
                                <div class="header-modal">
                                    <h2>Atenção</h2>
                                </div>
                                <div class="body-modal">
                                    <p>Tem certeza que deseja deletar?</p>
                                </div>
                                <div class="footer-modal">
                                    <button class="btn btn-secondary">Cancelar</button>
                                    <a href="deletar.php?id=<?php echo $dados['ID_PRODUTO']?>" class="btn btn-danger">Deletar</a>
                                </div>
                            </div>
                        <?php
                    }
                ?>
            </tbody>
        </table>
    </div>
    <script src="./bootstrap.bundle.min.js"></script>
    <script src="./modal.js"></script>
</body>
</html>