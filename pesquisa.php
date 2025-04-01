<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sistema de estoque | Pesquisar</title>
    <link rel="stylesheet" href="./bootstrap.min.css">
    <link rel="stylesheet" href="./modal.css">
</head>
<body>
    <?php
        include "./navbars/nav_sistema.php";
        include "./conexao.php";
        session_start();

        ?>
            <div class="container">
                <span class="badge text-bg-success mt-4" style="height: 25px; display: flex; justify-content: center; align-items: center; width: 150px; font-size: 0.9rem;">Resultado pesquisa</span>
            </div>
        <?php

        if(isset($_POST['pesquisa'])){
            $pesquisa = mysqli_escape_string($conn,$_POST['pesquisa']);
            $id_usuario = $_SESSION['id_usuario'];

            $query = "select * from produtos where nome_produto like '%$pesquisa%' and id_usuario = '$id_usuario' or descricao_produto like '%$pesquisa%' and id_usuario = '$id_usuario'";

            $res = mysqli_query($conn,$query);

            if($res){
                if(mysqli_num_rows($res) > 0){
                    ?> 
                        <div class="container">
                            <table class="table table-striped table-hover mt-3">
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
                                                        <a href="./atualizar.php?id=<?php echo $dados['ID_PRODUTO']?>" class="btn btn-success">Atualizar</a>
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
                    <?php
                }else{
                    header("Location: ./sistema.php?erro-pesquisa=Nenhum produto foi encontrado!");
                }
            }else{
                echo "Não funcionou";
            }
        }
    ?>
    <script src="./bootstrap.bundle.min.js"></script>
    <script src="./modal.js"></script>
</body>
</html>