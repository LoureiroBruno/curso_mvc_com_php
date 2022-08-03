<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">

<div class="login-popup-wrap new_login_popup" id="login">
    <div class="login-popup-heading text-center">
        <h4><i id="icone" class="fa fa-university" aria-hidden="true"></i></h4>
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

<style>
    body {
        background-color: #1e2c38f0;;
    }

    #icone {
        font-size: 60px;
    }

    .login-popup-heading>h4 {
        color: #e7ebed;;
        font-size: 37px;
        line-height: 30px;
    }

    #login {
        padding-top: 100px;
    }

    .new_reg_popup,
    .new_login_popup {
        border-radius: 2px;
        min-height: 332px;
        width: 400px;
        margin: 0px auto;
    }

    .login-popup-btn {
        background: #ff9800;
        border: none;
        border-radius: 25px;
        color: #fff;
        display: block;
        font-size: 18px;
        height: 38px;
        line-height: 28px;
        margin: 20px auto 5px;
        width: 150px;
        -webkit-transition: all 700ms ease;
        -moz-transition: all 700ms ease;
        -ms-transition: all 700ms ease;
        -o-transition: all 700ms ease;
    }

    a {
        color: #258b47;
        font-size: 18px;
    }
</style>