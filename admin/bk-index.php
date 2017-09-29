<?php

  $statusBdConexao = isset($_GET['erro-bd-conexao']) ? $_GET['erro-bd-conexao'] : 0;

  if ($statusBdConexao == 0) {
  	$loginValido = isset($_GET['erro-login']) ? $_GET['erro-signin'] : 0;
  	$statusAtivo = isset($_GET['erro-status']) ? $_GET['erro-status'] : 0;
  }

  $flag = false;

  if ($statusBdConexao == 1) {
    $errorMessage = "Erro ao tentar estabelecer conexão, tente mais tarde!";
    $flag = true;
  } else if ($loginValido == 1){
      $errorMessage = "Login e/ou senha inválido(s)!";
      $flag = true;
  } else if($statusAtivo == 1){
      $errorMessage = "Usuário já ativado!";
      $flag = true;
  }

?>

<!DOCTYPE html>
<html lang="pt-br">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="../../favicon.ico">

    <title>SIGP - TV UFG</title>

    <!-- Bootstrap core CSS -->
    <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <link href="assets/css/ie10-viewport-bug-workaround.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="estilo-login.css" rel="stylesheet">

    <!-- Just for debugging purposes. Don't actually copy these 2 lines! -->
    <!--[if lt IE 9]><script src="../../assets/js/ie8-responsive-file-warning.js"></script><![endif]-->
    <script src="assets/js/ie-emulation-modes-warning.js"></script>

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>

  <body>

    <div class="site-wrapper">

      <div class="site-wrapper-inner">

        <div class="cover-container">

          <div class="masthead clearfix">
            <div class="inner">
              <img class="masthead-brand" alt="TV UFG" src="images/logomark-white.png"/>
              <nav>
                <ul class="nav masthead-nav">
                  <li class="active"><a href="#">Entrar</a></li>
                  <li class="disabled"><a href="#">Contato</a></li>
                </ul>
              </nav>
            </div>
          </div>

          <div class="inner cover">
            <form class="form-signin" method="post" action="valida-acesso.php" id="signinForm">
              <h2 class="form-signin-heading">Fazer login</h2>
              <?php
                if ($flag == true) {
                  $buttonCloseAlert = '<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>';
                  $errorAlert = "<div class='alert alert-danger' role='alert'>$buttonCloseAlert<strong>$errorMessage</strong></div>";
                  echo "$errorAlert";
                }
              ?>
              <div class="input-group" id="inputGroupLogin">
                <span class="input-group-addon" id="userAddon"><span class="glyphicon glyphicon-user"></span></span>
                <label for="inputLogin" class="sr-only">Login</label>
                <input type="text" id="inputEmail" class="form-control" name="login" title="Informe o seu login" placeholder="Login" required autofocus>
              </div>
              <div class="input-group">
                <span class="input-group-addon" id="passwordAddon"><span class="glyphicon glyphicon-lock"></span></span>
                <label for="inputPassword" class="sr-only">Senha</label>
                <input type="password" id="inputPassword" class="form-control" name="senha" title="Informe a sua senha" placeholder="Senha" required>
              </div>
              <button class="btn btn-lg btn-primary btn-block" id="buttonSubmit" type="submit">Entrar</button>
            </form>
          </div>

          <div class="mastfoot">
            <div class="inner">
              <p>&copy; 2017 Departamento de engenharia e programação - <a href="http://www.tvufg.org.br/">TV UFG</a>.</p>
            </div>
          </div>

        </div>

      </div>

    </div>

    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="bootstrap/js/bootstrap.min.js"></script>
    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <script src="assets/js/ie10-viewport-bug-workaround.js"></script>
  </body>
</html>
