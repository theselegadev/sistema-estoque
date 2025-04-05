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
                <ul>
                    <?php
                        while($dados = mysqli_fetch_array($res)){
                            ?>
                                <li><?php echo $dados['data_venda_produtos']?></li>
                                <li><?php echo $dados['total_vendido']?></li>
                                <li><?php echo $dados['produtos_vendidos']?></li>
                            <?php
                        }
                    ?>
                </ul> 
            <?php
        }
    ?>
    <script src="./bootstrap.bundle.min.js"></script>
</body>
</html>