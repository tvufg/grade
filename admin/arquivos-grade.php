<?php

session_start();

if(!isset($_SESSION['login'])){
	header('Location: index.php?erro-login=1');
}

// header("Pragma: no-cache");
// header("Expires: Mon, 20 Jul 2000 03:00:00 GMT");
// header("Last-Modified: " . gmdate("D, d M Y H:i:s") . " GMT");
// header("Cache-Control: no-cache, cachehack=" . time());
// header("Cache-Control: no-store, must-revalidate");
// header("Cache-Control: post-check=-1, pre-check=-1", false);

?>

<!doctype html>
<html lang="pt-br">
	<head>
		<meta charset="utf-8" />
		<link rel="icon" type="image/png" href="../imagens/favicon.ico">
		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
		<meta name="author" content="Matheus Pimenta (matheuspiment@hotmail.com)">

		<title>TV UFG | Arquivos</title>

		<meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0' name='viewport' />
    <meta name="viewport" content="width=device-width" />

    <!-- Bootstrap core CSS     -->
    <link href="assets/css/bootstrap.min.css" rel="stylesheet" />

    <!--  Light Bootstrap Dashboard core CSS    -->
    <link href="assets/css/light-bootstrap-dashboard.css" rel="stylesheet"/>

		<link rel="stylesheet" type="text/css" href="CustomFileInputs/css/normalize.css" />
		<!-- <link rel="stylesheet" type="text/css" href="CustomFileInputs/css/demo.css" /> -->
		<link rel="stylesheet" type="text/css" href="CustomFileInputs/css/component.css" />

    <!--     Fonts and icons     -->
    <link href="http://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css" rel="stylesheet">
    <link href='http://fonts.googleapis.com/css?family=Roboto:400,700,300' rel='stylesheet' type='text/css'>
    <link href="assets/css/pe-icon-7-stroke.css" rel="stylesheet" />

		<link href="assets/css/galeria.min.css" rel="stylesheet" />

		<link href="assets/css/zoom.css" rel="stylesheet">

		<!-- remove this if you use Modernizr -->
		<script>(function(e,t,n){var r=e.querySelectorAll("html")[0];r.className=r.className.replace(/(^|\s)no-js(\s|$)/,"$1js$2")})(document,window,0);</script>

		<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>

	</head>

	<body class="sidebar-mini">
		<div class="wrapper">
    	<div class="sidebar" style="position: fixed;" data-color="azure">
      	<div class="logo">
					<div style="padding: 10px 20px 10px 20px;">
						<img class="img-responsive"src="../imagens/logomark-white.png"/>
					</div>
      	</div>
				<div class="logo logo-mini">
					<div style="padding: 5px 10px 5px 10px;">
						<img class="img-responsive"src="../imagens/logomark-white.png"/>
					</div>
				</div>
    		<div class="sidebar-wrapper" style="height: initial;">
					<ul class="nav">
				 		<li>
				   		<a href="dashboard.php">
				   			<i class="pe-7s-graph"></i>
				        <p>Dashboard</p>
				      </a>
				    </li>
          	<li class="active">
          		<a href="arquivos-grade.php">
            		<i class="pe-7s-file"></i>
              	<p>Arquivos</p>
              </a>
            </li>
						<li>
				    	<a data-toggle="collapse" href="#componentsExamples" aria-expanded="true">
								<i class="pe-7s-photo-gallery"></i>
								<p>Galeria
                	<b class="caret"></b>
                </p>
				      </a>
							<!-- collapse in -->
				    	<div class="collapse" id="componentsExamples">
				    		<ul class="nav">
				       		<li class="active"><a href="galeria-capa.php">Imagens de Capa</a></li>
				        	<li><a href="galeria-destaque.php">Imagens de Destaque</a></li>
				      	</ul>
				     	</div>
				  	</li>
					</ul>
    		</div>
    	</div>

    	<div class="main-panel">
      	<nav class="navbar navbar-default navbar-fixed-top navbar-fixed-top-mini">
      		<div class="container-fluid">
						<div class="navbar-minimize">
							<button id="minimizeSidebar" class="btn btn-black btn-fill btn-round btn-icon">
								<i class="fa fa-ellipsis-v visible-on-sidebar-regular"></i>
								<i class="fa fa-navicon visible-on-sidebar-mini"></i>
							</button>
						</div>
          	<div class="navbar-header">
          		<button type="button" class="navbar-toggle" data-toggle="collapse">
            		<span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
              	<span class="icon-bar"></span>
              	<span class="icon-bar"></span>
            	</button>
          		<a class="navbar-brand" href="#">Grade de Programação</a>
            </div>
          	<div class="collapse navbar-collapse">
							<form class="navbar-form navbar-left navbar-search-form" role="search" data-tg="tooltip" data-placement="bottom" title="Disponível em breve!">
								<div class="input-group">
									<span class="input-group-addon"><i class="fa fa-search"></i></span>
									<input disabled type="text" value="" class="form-control" placeholder="Search...">
								</div>
							</form>
          		<ul class="nav navbar-nav navbar-right">
								<li>
									<a class="icon" href="#"id="botao-remover" style="color: #FB404B;" data-tg="tooltip" data-placement="bottom" title="Excluir">
										<input type="submit" value="Remover imagem" class="btn-danger btn-fill btn-round"style="display: none">
										<i class="fa fa-trash"></i>
										<p class="hidden-md hidden-lg">Excluir</p>
									</a>
								</li>
								<li>
									<a class="icon" href="#" id="sellectAll" style="color: #23CCEF;" data-tg="tooltip" data-placement="bottom" title="Check/Uncheck">
										<i class="fa fa-check-square"></i>
										<p class="hidden-md hidden-lg">Check/Uncheck</p>
									</a>
								</li>
								<li>
									<a class="icon" href="#" data-toggle="modal" data-target="#uploadModal" style="color: #447DF7;" data-tg="tooltip" data-placement="bottom" title="Upload de Imagem">
										<i class="fa fa-upload"></i>
										<p class="hidden-md hidden-lg">Upload</p>
									</a>
								</li>
								<li>
									<a href="sair.php" class="text icon" style="color: red;" data-tg="tooltip" data-placement="bottom" title="Sair">
										<i class="fa fa-close"></i>
										<p class="hidden-md hidden-lg">
											Log out
										</p>
									</a>
								</li>
            	</ul>
          	</div>
        	</div>
      	</nav>

  			<div class="content" id="cont">
        	<div class="container-fluid">
						<div class="row">
							<div class="col-md-12">
								<div class="card">
									<div class="header">
										<h4 class="title">Grade em PDF</h4>
										<p class="category">Arquivos pdf's com a grade de programacao</p>
									</div>
                	<div class="content table-responsive table-full-width">
                  	<table class="table">
                  		<thead>
                    		<tr>
                      		<th class="text-center">#</th>
                        	<th>Name</th>
                        	<th class="text-right">Actions</th>
                      	</tr>
                    	</thead>
                    	<tbody>
                      </tbody>
                    </table>
                	</div>
								</div>
							</div>
						</div>
          </div>
        </div>

        <footer class="footer">
        	<div class="container-fluid">
        		<nav class="pull-left"></nav>
            <p class="copyright pull-right">
							&copy; 2017 TV UFG | Diretor de Engenharia e Operações
            </p>
          </div>
        </footer>
    	</div>
		</div>

		<div class="modal fade" id="uploadModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
			<div class="modal-dialog modal-sm" role="document">
				<div class="modal-content">
					<div class="modal-body">
						<div class="content">
							<div class="box" >
								<form id="image-uploader" enctype="multipart/form-data">
									<input type="file" name="files[]" id="multipleFiles" class="inputfile inputfile-4" data-multiple-caption="{count} files selected" multiple style="display:none;" accept=".pdf"/>
									<label style="display: block; margin: 10px auto;"for="multipleFiles">
										<figure>
											<svg xmlns="http://www.w3.org/2000/svg" width="20" height="17" viewBox="0 0 20 17">
												<path d="M10 0l-5.2 4.9h3.3v5.1h3.8v-5.1h3.3l-5.2-4.9zm9.3 11.5l-3.2-2.1h-2l3.4 2.6h-3.5c-.1 0-.2.1-.2.1l-.8 2.3h-6l-.8-2.2c-.1-.1-.1-.2-.2-.2h-3.6l3.4-2.6h-2l-3.2 2.1c-.4.3-.7 1-.6 1.5l.6 3.1c.1.5.7.9 1.2.9h16.3c.6 0 1.1-.4 1.3-.9l.6-3.1c.1-.5-.2-1.2-.7-1.5z"/>
											</svg>
										</figure>
										<span style="display: table; margin: 0px auto;">Choose a file&hellip;</span>
									</label>
								</form>
							</div>
						</div>
					</div>
					<div class="modal-footer">
						<button type="button" class="btn btn-default" data-dismiss="modal">Fechar</button>
						<button type="button" id="upload-arquivo" class="btn btn-primary">Enviar</button>
					</div>
				</div>
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

	<!-- Wizard Plugin    -->
  <script src="assets/js/jquery.bootstrap.wizard.min.js"></script>

  <!--  bootstrap Table Plugin    -->
  <script src="assets/js/bootstrap-table.js"></script>

	<!--  Plugin for DataTables.net  -->
  <script src="assets/js/jquery.datatables.js"></script>

  <!--  Full Calendar Plugin    -->
  <script src="assets/js/fullcalendar.min.js"></script>

  <!-- Light Bootstrap Dashboard Core javascript and methods -->
	<script src="assets/js/light-bootstrap-dashboard.js"></script>

	<script src="CustomFileInputs/js/custom-file-input.js"></script>

	<script src="assets/js/arquivos.min.js"></script>

</html>
