<?php
    include "./conexao.php";
    session_start();

    if(isset($_GET['id'])){
        $id = $_GET['id'];
        $id_usuario = $_SESSION['id_usuario'];
        $query = "delete from produtos where id_produto = '$id' and id_usuario = '$id_usuario'";

        $res = mysqli_query($conn,$query);

        if($res){
            header("Location: ./sistema.php?excluir=Produto excluido com sucesso!");
        }
    }else if(isset($_SESSION['logado'])){
        header("Location: ./index.php");
    }else{
        header("Location: ./index.php");
    }
?>