<!DOCTYPE html>
<html lang="pt-br">

<head>
    <title>Cadastro de Cursos::Login</title>
    <link rel="shortcut icon" href="/icone/favicon.ico">
    <meta charset="UTF-8">
    <!--Import Google Icon Font-->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <!-- Compiled and minified CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
    <!-- Compiled and minified JavaScript -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
    <!--CSS at end of body for optimized loading-->
    <link rel="stylesheet" type="text/css" href="../css/telaLogin.css">
    <!--JavaScript at end of body for optimized loading-->
    <script type="text/javascript" src="../js/telaLogin.js"></script>
    
</head>

<body ng-app="mainModule" ng-controller="mainController">
    <div id="login-page" class="row">
        <div class="col s12 z-depth-6 card-panel">
            <form id="loginMember" class="login-form" role="form" action="/realiza-login" method="post">
                <div class="row">
                    <center>
                        <i class="large material-icons">account_box</i>
                        <i><p id="titulo-login">Sistema de Cadastro Cursos</p></i>
                    </center>
                </div>
                <div class="row">
                    <div class="input-field col s12">
                        <i class="material-icons prefix">mail_outline</i>
                        <input class="validate" id="email" type="email" name="email">
                        <label for="email" data-error="wrong" data-success="right">Email</label>
                    </div>
                </div>
                <div class="row">
                    <div class="input-field col s12">
                        <i class="material-icons prefix">lock_outline</i>
                        <input id="password" type="password" name="senha">
                        <label for="password">Password</label>
                    </div>
                </div>
                <div class="row">
                    <div class="input-field col s12">
                        <button type="submit" class="btn waves-effect waves-light col s12" name="submit">Entrar</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
    <?php if (isset($_SESSION['mensagem'])) : ?>
        <div id="container-mensagem" class="container">
            <div id="alert-mensagem" class="alert alert-<?= $_SESSION['tipo_mensagem']; ?>" role="alert">
                <?= $_SESSION['mensagem']; ?>
            </div>
        </div>
        <?php unset($_SESSION['mensagem']);
        unset($_SESSION['tipo_mensagem']); ?>
    <?php endif; ?>
</body>

</html>