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

        $query = "select vp.data_venda_produtos, sum(vp.valor_total) from produtos p, venda_produtos vp where vp.data_venda_produtos = vp.data_venda_produtos and p.id_usuario = '$id_usuario';";

        $res = mysqli_query($conn,$query);

        $dados = mysqli_fetch_all($res);

        if($res){
            $query = "select distinct p.nome_produto from produtos p, venda_produtos vp where p.id_produto = vp.id_produto and vp.data_venda_produtos = vp.data_venda_produtos and p.id_usuario = '$id_usuario'";

            $resultado = mysqli_query($conn,$query);

            if($resultado){
                $nomes = mysqli_fetch_all($resultado);

                array_push($dados,$nomes);
                
                echo "<pre>";
                print_r($dados);
                echo "<pre>";
            }
        }
    ?>
    <script src="./bootstrap.bundle.min.js"></script>
</body>
</html>