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
        session_start();
        
        if(empty($_SESSION['logado'])){
            header("Location: ./index.php");
        }
    ?>
        
    <script src="./bootstrap.bundle.min.js"></script>
</body>
</html>