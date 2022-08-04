<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <title>Document</title>
    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="../listar-cursos.css">
    <!-- JS only -->
    <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa" crossorigin="anonymous"></script>
</head>

<body>
    <header>
        <div class="container">
            <h1 id="titulo-curso" style="color: white;"><?= $titulo; ?></h1>
        </div>
        <nav class="navbar navbar-dark bg-dark fixed-top">
            <div class="container-fluid">
                <a class="navbar-brand" href="/listar-cursos"></a>
                <button class="navbar-toggler" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasDarkNavbar" aria-controls="offcanvasDarkNavbar">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="offcanvas offcanvas-end text-bg-dark" tabindex="-1" id="offcanvasDarkNavbar" aria-labelledby="offcanvasDarkNavbarLabel">
                    <div class="offcanvas-header">
                        <h5 class="offcanvas-title" id="offcanvasDarkNavbarLabel">Lendo o conteúdo de</br><b><u><?= $titulo; ?></b></u></h5>
                        <button type="button" class="btn-close btn-close-white" data-bs-dismiss="offcanvas" aria-label="Close"></button>
                    </div>
                    <div class="offcanvas-body">
                        <ul class="navbar-nav justify-content-end flex-grow-1 pe-3">
                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                <?= "Usuário Logado" ?>
                                </a>
                                <ul class="dropdown-menu dropdown-menu-dark">
                                    <li><a class="dropdown-item" href="#"><?=$_SESSION['nome_usuario']?></a></li>
                                    <li>
                                        <hr class="dropdown-divider">
                                    </li>
                                    <li><a class="dropdown-item" href="/logout">Sair</a></li>
                                </ul>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link active" aria-current="page" href="/listar-cursos">Voltar à Página <b><u>Inicial</u></b> </a>
                            </li>
                        </ul>
                        <form class="d-flex" role="search">
                            <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
                            <button class="btn btn-success">Search</button>
                        </form>
                    </div>
                </div>
            </div>
        </nav>
    </header>
    <br>
    <main>
    <?php if (isset($_SESSION['mensagem'])) : ?>
        <div id="container-mensagem" class="container">
            <div id="alert-mensagem" class="alert alert-<?= $_SESSION['tipo_mensagem']; ?>" role="alert">
                <?= $_SESSION['mensagem']; ?>
            </div>
        </div>
        <?php unset($_SESSION['mensagem']); unset($_SESSION['tipo_mensagem']);?>
    <?php endif; ?>

