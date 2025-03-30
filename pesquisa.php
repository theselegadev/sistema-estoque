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
                                                        <button class="btn btn-secondary" id="btn-cancelar">Cancelar</button>
                                                        <a href="deletar.php?id=<?php echo $dados['ID_PRODUTO']?>" class="btn btn-danger">Deletar</a>
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