<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sistema de estoque</title>
    <link rel="stylesheet" href="./bootstrap.min.css">
    <link rel="stylesheet" href="./style.css?v=2.0">
</head>
<body style="overflow-x: hidden">
    <section>
        <?php
            include "./navbars/nav.php";
            session_start();

            if(!empty($_SESSION['logado'])){
                header("Location: ./sistema.php");
            }

            if(isset($_GET['saiu'])){
                ?>
                    <div class="container">
                        <div class="alert alert-secondary alert-dismissible fade show mt-4" role="alert">
                            <?php echo $_GET['saiu']?>   
                            <a href="index.php"><button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button></a>
                        </div>
                    </div>
                <?php
            }
        ?>
        <main>
            <div class="left">
                <div class="box">
                    <div class="card-text">
                        <h2>O sistema de estoque simples que resolve!</h2>
                    </div>
                    <div class="card-title">
                        <h1>Tudo o que você precisa para fazer a gestão e o controle do seu estoque!</h1>
                    </div>
                    <div class="card-details">
                        <p>Desenvolvido pensando nas necessidades do pequeno comerciante. Um sistema completo para controle de estoque, vendas e histórico, com suporte e atualizações sob medida. Cadastre produtos, registre vendas e acompanhe seu estoque com agilidade e segurança.</p>
                        <h5><b>Inscreva-se grátis!</b></h5>
                    </div>
                    <div class="card-button">
                        <button class="btn btn-success">Inscrever-se gratuitamente</button>
                    </div>
                </div>
            </div>
            <div class="rigth">
                <img src="./Vendas.png" alt="imagem-venda" width="500px" height="450px">
            </div>
        </main>
    </section>
    <section class="functionality">
        <div class="container-icons">
            <div>
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-check-circle-fill" viewBox="0 0 16 16">
                    <path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0m-3.97-3.03a.75.75 0 0 0-1.08.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-.01-1.05z"/>
                </svg>
                <p>Inserção de produtos do seu estoque no sistema.</p>
            </div>
            <div>
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-check-circle-fill" viewBox="0 0 16 16">
                    <path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0m-3.97-3.03a.75.75 0 0 0-1.08.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-.01-1.05z"/>
                </svg>
                <p>Atualização/Edição dos produtos inseridos nos sistema.</p>
            </div>
            <div>
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-check-circle-fill" viewBox="0 0 16 16">
                    <path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0m-3.97-3.03a.75.75 0 0 0-1.08.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-.01-1.05z"/>
                </svg>
                <p>Registro de vendas no sistema vinculado ao estoque.</p>
            </div>
            <div>
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-check-circle-fill" viewBox="0 0 16 16">
                    <path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0m-3.97-3.03a.75.75 0 0 0-1.08.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-.01-1.05z"/>
                </svg>
                <p>Histórico das vendas realizadas nos sistema.</p>
            </div>
        </div>
        <div class="box-button">
            <button class="btn-inscrever">Inscrever-se grátis</button>
        </div>
    </section>
    <script src="./bootstrap.bundle.min.js"></script>
</body>
</html>