<?php

	session_start();

	if(isset($_SESSION['login'])) {
		header("Location: dashboard.php");
		die();
	}

  $statusBdConexao = isset($_GET['erro-bd-conexao']) ? $_GET['erro-bd-conexao'] : 0;

  if ($statusBdConexao == 0) {
  	$loginValido = isset($_GET['erro-login']) ? $_GET['erro-login'] : 0;
  }

  $flag = false;

  if ($statusBdConexao == 1) {
    $errorMessage = "Erro ao tentar estabelecer conexão, tente mais tarde!";
    $flag = true;
  } else if ($loginValido == 1){
      $errorMessage = "Login e/ou senha inválido(s)!";
      $flag = true;
  }

?>

<!doctype html>
<html lang="pt-br">
	<head>
		<meta charset="utf-8" />
    <link rel="icon" type="image/png" href="../imagens/favicon.ico">
		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
		<meta name="author" content="Matheus Pimenta powered by Creative-Tim">

		<title>TV UFG | Admin</title>

		<meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0' name='viewport' />
    <meta name="viewport" content="width=device-width" />


    <!-- Bootstrap core CSS     -->
    <link href="assets/css/bootstrap.min.css" rel="stylesheet" />

    <!--  Light Bootstrap Dashboard core CSS    -->
    <link href="assets/css/light-bootstrap-dashboard.css" rel="stylesheet"/>


    <link href="assets/css/login.css" rel="stylesheet" />

    <!--     Fonts and icons     -->
    <link href="http://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css" rel="stylesheet">
    <link href='http://fonts.googleapis.com/css?family=Roboto:400,700,300' rel='stylesheet' type='text/css'>
    <link href="assets/css/pe-icon-7-stroke.css" rel="stylesheet" />

	</head>

	<body style="max-height: 100% !important; height: auto !important; overflow: hidden;">
		<div class="wrapper wrapper-full-page">
    	<div class="full-page login-page" data-color="azure">
    	<!--   you can change the color of the filter page using: data-color="blue | azure | green | orange | red | purple" -->
      	<div class="content">
        	<div class="container">
          	<div class="row">
            	<div class="col-md-4 col-sm-6 col-md-offset-4 col-sm-offset-3">
              	<form method="post" action="valida-acesso.php" id="formLogin">
              	<!--   if you want to have the card without animation please remove the ".card-hidden" class   -->
                	<div class="card card-hidden">
										<div style="display: block;">
											<img style="margin: 0px auto 0px auto; width: 150px; margin-bottom: 15px;"class="img-responsive"src="../imagens/logomark-azul.png"/>
										</div>
                  	<div class="content">
											<?php
												if ($flag == true) {
													$buttonCloseAlert = '<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>';
													$errorAlert = "<div class='alert alert-danger' role='alert'>$buttonCloseAlert<strong>$errorMessage</strong></div>";
													echo "$errorAlert";
												}
											?>
              				<div class="form-group">
                      	<input id="campo_usuario" name="login" type="text" placeholder="Usuário" class="form-control">
                      </div>
                    	<div class="form-group">
                      	<input  id="campo_senha" name="senha" type="password" placeholder="Senha" class="form-control">
                    	</div>
                      <!-- <div class="form-group">
                      	<label class="checkbox">
                  				<input type="checkbox" data-toggle="checkbox" value="">
                      		Subscribe to newsletter
                        </label>
                      </div> -->
                    </div>
                		<div class="footer text-center">
                  		<button id="btn_login" style="background-color: #009de0; border-color: #009de0;" form="formLogin" type="submit" class="btn btn-fill btn-wd">Entrar</button>
                		</div>
            			</div>
              	</form>
              </div>
            </div>
          </div>
      	</div>

    		<footer class="footer footer-transparent">
        	<div class="container">
      			<p class="copyright pull-right" style="color: white;">
							&copy; 2017 TV UFG | Diretor de Engenharia e Operações</a>
        		</p>
      		</div>
    		</footer>
    	</div>
		</div>
	</body>

  <!--   Core JS Files and PerfectScrollbar library inside jquery.ui   -->
  <script src="assets/js/jquery.min.js" type="text/javascript"></script>
  <script src="assets/js/jquery-ui.min.js" type="text/javascript"></script>
	<script src="assets/js/bootstrap.min.js" type="text/javascript"></script>

	<!--  Forms Validations Plugin -->
	<script src="assets/js/jquery.validate.min.js"></script>

	<!--  Plugin for Date Time Picker and Full Calendar Plugin-->
	<script src="assets/js/moment.min.js"></script>

  <!--  Date Time Picker Plugin is included in this js file -->
  <script src="assets/js/bootstrap-datetimepicker.js"></script>

  <!--  Select Picker Plugin -->
  <script src="assets/js/bootstrap-selectpicker.js"></script>

	<!--  Checkbox, Radio, Switch and Tags Input Plugins -->
	<script src="assets/js/bootstrap-checkbox-radio-switch-tags.js"></script>

	<!--  Charts Plugin -->
	<script src="assets/js/chartist.min.js"></script>

  <!--  Notifications Plugin    -->
  <script src="assets/js/bootstrap-notify.js"></script>

  <!-- Sweet Alert 2 plugin -->
	<script src="assets/js/sweetalert2.js"></script>

  <!-- Vector Map plugin -->
	<script src="assets/js/jquery-jvectormap.js"></script>

  <!--  Google Maps Plugin    -->
  <!-- <script src="https://maps.googleapis.com/maps/api/js"></script> -->

	<!-- Wizard Plugin    -->
  <script src="assets/js/jquery.bootstrap.wizard.min.js"></script>

  <!--  Datatable Plugin    -->
  <script src="assets/js/bootstrap-table.js"></script>

  <!--  Full Calendar Plugin    -->
  <script src="assets/js/fullcalendar.min.js"></script>

  <!-- Light Bootstrap Dashboard Core javascript and methods -->
	<script src="assets/js/light-bootstrap-dashboard.js"></script>

	<!-- Light Bootstrap Dashboard DEMO methods, don't include it in your project! -->
	<script src="assets/js/demo.js"></script>

  <script type="text/javascript">
		$().ready(function(){
			lbd.checkFullPageBackgroundImage();
    	setTimeout(function(){
      	// after 1000 ms we add the class animated to the login/register card
      	$('.card').removeClass('card-hidden');
    	}, 700)
  	});

		//verificar se os campos de usuário e senha foram devidamente preenchidos
		$('#btn_login').click(function(){

			var campo_vazio = false;

			if($('#campo_usuario').val() == ''){
				$('#campo_usuario').css({'border-color': '#A94442'});
				campo_vazio = true;
			} else {
				$('#campo_usuario').css({'border-color': '#CCC'});
			}

			if($('#campo_senha').val() == ''){
				$('#campo_senha').css({'border-color': '#A94442'});
				campo_vazio = true;
			} else {
				$('#campo_senha').css({'border-color': '#CCC'});
			}

			if(campo_vazio) return false;
		});
		
	</script>
</html>
