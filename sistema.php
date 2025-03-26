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
        
    <script src="./bootstrap.bundle.min.js"></script>
</body>
</html>