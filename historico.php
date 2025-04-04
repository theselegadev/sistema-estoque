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

        $query = "select p.nome_produto, vp.data_venda_produtos, vp.quantidade_venda_produtos, vp.valor_total from venda_produtos vp, produtos p where vp.id_produto = p.id_produto and p.id_usuario = '$id_usuario'";

        $res = mysqli_query($conn,$query);

        if($res){
            while($dados = mysqli_fetch_array($res)){
                echo "<pre>";
                print_r($dados);
                echo "</pre>";
            }
        }
    ?>
    <script src="./bootstrap.bundle.min.js"></script>
</body>
</html>