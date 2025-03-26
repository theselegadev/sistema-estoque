<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sistema de estoque</title>
    <link rel="stylesheet" href="./bootstrap.min.css">
</head>
<body style="overflow-x: hidden">
    <?php
        include "./navbars/nav.php";
        session_start();

        if(!empty($_SESSION['logado'])){
            header("Location: ./sistema.php");
        }

        if(isset($_GET['saiu'])){
            ?>
                <div class="container">
                    <div class="alert alert-secondary alert-dismissible fade show" role="alert">
                        <?php echo $_GET['saiu']?>   
                        <a href="index.php"><button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button></a>
                    </div>
                </div>
            <?php
        }
    ?>
    <script src="./bootstrap.bundle.min.js"></script>
</body>
</html>