<style>
    header {
        background: url("bg.jpg");
        padding: 80px 0;
        background-position: right;
    }

    #titulo-curso {
        padding-top: 30px;
    }

    nav {
        position: absolute;
        top: 10px;
        right: 50;
    }

    nav li {
        display: inline;
        margin: 0 0 0 15px;
    }

    nav a {
        /* text-transform: uppercase; */
        color: #FFFFFF;
        /* font-weight: bold; */
        font-size: 18px;
        text-decoration: none;
    }

    main {
        padding-top: 150px;
    }

    footer {
        background: url("formacoes.png");
        padding: 80px 0;
        background-position: right;
        margin-top: 250px;
    }
</style>

<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <title>Document</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
</head>

<body>
    <header>
        <div class="container">
            <h1 id="titulo-curso" style="color: white;"><?= $titulo; ?></h1>
        </div>

        <nav>
            <ul>
                <li><a href="/login">Logout</a></li>
            </ul>
        </nav>

    </header>
    <br>
    <main>