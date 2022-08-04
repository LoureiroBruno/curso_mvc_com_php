<!DOCTYPE html>
<html lang="pt-br">

<head>
    <title>Cadastro de Cursos</title>
    <link rel="shortcut icon" href="/icone/favicon.ico">
    <meta charset="UTF-8">
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="../login.css">
</head>

<body>
    <div class="login-popup-wrap new_login_popup" id="login">
        <div class="login-popup-heading text-center">
            <h4><i id="icone" class="fa fa-cog fa-spin fa-3x fa-fw"></i></i></h4><span class="sr-only">Loading...</span>
        </div>
        <div class="login-popup-heading text-center">
            <h4>Cadastro de Cursos</h4>
        </div>
        </br>
        <form id="loginMember" role="form" action="/realiza-login" method="post">
            <div class="form-group">
                <input type="email" class="form-control" id="user_id" placeholder="E-mail" name="email">
            </div>
            <div class="form-group">
                <input type="password" class="form-control" id="password" placeholder="Senha" name="senha">
            </div>
            </br>
            <button type="submit" class="btn btn-default login-popup-btn" name="submit">Entrar</button>
        </form>

    </div>

    <?php if (isset($_SESSION['mensagem'])) : ?>
        <div id="container-mensagem" class="container">
            <div id="alert-mensagem" class="alert alert-<?= $_SESSION['tipo_mensagem']; ?>" role="alert">
                <?= $_SESSION['mensagem']; ?>
            </div>
        </div>
        <?php unset($_SESSION['mensagem']); unset($_SESSION['tipo_mensagem']);?>
    <?php endif; ?>
</body>

</html>