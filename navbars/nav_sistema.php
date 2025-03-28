<nav class="navbar bg-body-tertiary">
  <div class="container-fluid">
    <a class="navbar-brand" href="./sistema.php">Sistema de estoque</a>
    <div class="row">
        <div class="col">
            <div class="dropdown">
                <button class="btn btn-primary dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                    Gestão de Itens
                </button>
                <ul class="dropdown-menu">
                    <li><a class="dropdown-item" href="./inserir.php">Inserir produto</a></li>
                    <li><a class="dropdown-item" href="./sistema.php">Lista de produtos</a></li>
                </ul>
            </div>
        </div>
    </div>  
    <div class="row">
        <div class="col-9">
            <div class="row">
                <form class="d-flex" role="search" action="./pesquisa.php" method="post">
                    <div class="col-7">
                        <input class="form-control me-2" type="search" placeholder="Pesquisar" aria-label="Search" name="pesquisa" required>
                    </div>
                    <div class="col-1">

                    </div>
                    <div class="col-4">
                        <button class="btn btn-outline-success" type="submit">Pesquisar</button>
                    </div>
                </form>
            </div>
        </div>
        <div class="col-3">
            <a href="./logout.php"><button class="btn btn-outline-danger">Sair</button></a>
        </div>
    </div>
</nav>