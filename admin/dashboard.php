<?php

	session_start();

	if(!isset($_SESSION['login'])){
		header('Location: index.php?erro-login=1');
	}

?>

<!doctype html>
<html lang="pt-br">
<head>
	<meta charset="utf-8" />
	<link rel="icon" type="image/png" href="../imagens/favicon.ico">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
	<meta name="author" content="Matheus Pimenta (matheuspiment@hotmail.com)">

	<title>TV UFG | Dashboard</title>

	<meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0' name='viewport' />
  <meta name="viewport" content="width=device-width" />


  <!-- Bootstrap core CSS     -->
  <link href="assets/css/bootstrap.min.css" rel="stylesheet" />

  <!--  Light Bootstrap Dashboard core CSS    -->
  <link href="assets/css/light-bootstrap-dashboard.css" rel="stylesheet"/>

  <!--  CSS for Demo Purpose, don't include it in your project     -->

	<link href="image-picker/image-picker.css" rel="stylesheet" />

	<link href="assets/css/zoom.css" rel="stylesheet">

	<link href="assets/css/dashboard.css" rel="stylesheet"/>

  <!--     Fonts and icons     -->
  <link href="http://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css" rel="stylesheet">
  <link href='http://fonts.googleapis.com/css?family=Roboto:400,700,300' rel='stylesheet' type='text/css'>
  <link href="assets/css/pe-icon-7-stroke.css" rel="stylesheet" />
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>

</head>
<body class="sidebar-mini">
	<div id="player-destaque" class="row" style="display: none; background-color: rgba(0, 0, 0, 0.9); height: -webkit-fill-available; width: -webkit-fill-available; z-index: 4; position: fixed;">
		<div class="col-md-6 col-md-offset-3" style="margin-top: 2%;">
			<button id="dismiss-player"class="btn btn-simple"style="float: right; margin-right: -80px; color: white;"href="#">
				<i class="fa fa-close"></i>
			</button>
		</div>
		<div class="col-md-6 col-md-offset-3" style="margin-top: 3%;">
			<div class="embed-responsive embed-responsive-16by9">
				<iframe id="src-destaque" class="embed-responsive-item" src="https://player.vimeo.com/video/104823913" allowfullscreen></iframe>
			</div>
		</div>
	</div>

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
        	<li class="active">
          	<a href="dashboard.php">
            	<i class="pe-7s-graph"></i>
              <p>Dashboard</p>
            </a>
          </li>
					<li>
						<a href="arquivos-grade.php">
							<i class="pe-7s-file"></i>
							<p>Arquivos</p>
						</a>
					</li>
					<li>
          	<a data-toggle="collapse" href="#componentsExamples">
							<i class="pe-7s-photo-gallery"></i>
							<p>Galeria
								<b class="caret"></b>
							</p>
            </a>
						<!-- collapse in -->
            <div class="collapse" id="componentsExamples">
            	<ul class="nav">
              	<li><a href="galeria-capa.php">Imagens de Capa</a></li>
                <li><a href="galeria-destaque.php">Imagens de Destaque</a></li>
              </ul>
            </div>
          </li>
        </ul>
    	</div>
    </div>

		<div class="main-panel">
			<nav class="navbar navbar-default">
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
						<ul class="nav navbar-nav navbar-right">
							<li>
								<a href="sair.php" style="color: red; opacity: 0.8;" class="text">
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

      <div class="content">
      	<div class="container-fluid">
        	<div class="row">
          	<div class="col-md-4">
            	<div class="card">
              	<div id="d-header"class="header toolbar">
                	<h4 class="title">Dias</h4>
                  <p class="category">Dias registrados</p>
									<button type="button" id="botao-copiar-dia" class="btn btn-success btn-fill btn-round" style="float: right; margin-top: -45px; margin-right: 60px;" data-toggle="tooltip" data-placement="bottom" title="Copiar dia(s)">
										<i class="fa fa-copy"></i>
									</button>
									<button type="submit" id="btn-rm-dia" class="btn btn-danger btn-fill btn-round" style="float: right; margin-top: -45px;" data-toggle="tooltip" data-placement="bottom" title="Remover dia(s)">
										<i class="fa fa-minus"></i>
									</button>
                </div>
                <div id="d-content" class="content scroll-content" style="max-height: 690px; height: auto; overflow: scroll;">
									<div class="panel-group" id="dias"></div>
                </div>
              </div>
            </div>

            <div class="col-md-8">
            	<div class="card">
              	<div id="pg-header"class="header toolbar">
                	<h4 class="title">Programas</h4>
                  <p style="width: 60%; color: #FB404B; font-weight: bold;" class="category">Nunca apagar e/ou alterar os dados de um programa registrado em mais de um dia, pois o mesmo integra o histórico da grade de programação</p>
									<button type="button" id="botao-novo-pg" class="btn btn-primary btn-fill btn-round"style="float: right; margin-top: -45px; margin-right: 180px;" data-toggle="tooltip" data-placement="bottom" title="Adicionar programa">
										<i class="fa fa-plus"></i>
									</button>
									<button type="submit" id="botao-novo-dia" class="btn btn-info btn-fill btn-round" style="float: right; margin-top: -45px; margin-right: 120px;" data-toggle="tooltip" data-placement="bottom" title="Adicionar programa(s) em determinado dia">
										<i class="fa fa-list-alt"></i>
									</button>
									<button type="button" id="botao-copiar-programa" class="btn btn-success btn-fill btn-round" style="float: right; margin-top: -45px; margin-right: 60px;" data-toggle="tooltip" data-placement="bottom" title="Copiar programa(s)">
										<i class="fa fa-copy"></i>
									</button>
									<button type="submit" id="botao-remover" class="btn btn-danger btn-fill btn-round" style="float: right; margin-top: -45px;" data-toggle="tooltip" data-placement="bottom" title="Remover programa(s)">
										<i class="fa fa-minus"></i>
									</button>
              	</div>

								<div id="pg-content" class="content scroll-content" style="max-height: 675px; height: auto; overflow: scroll;">
									<div>
										<p class="font-verdana" style="display:inline;margin-left: 32px;">ID</p>
										<p class="font-verdana" style="display:inline; font-size: 16px; margin-left: 38px;">IMG CAPA</p>
										<p class="font-verdana" style="display:inline; margin-left: 24px;">HORA</p>
										<p class="font-verdana" style="display:inline; font-size: 16px; margin-left: 10px;">TÍTULO</p>
										<p class="font-verdana" style="display:inline; font-size: 16px; float:right; margin-right: 20px; margin-bottom: 0px;">EDIT</p>
										<hr style="margin-top: 2px; margin-bottom: 0px; border-color: #d9d9d9"/>
									</div>
									<div class="panel-group" id="programas"></div>
								</div>
              </div>
            </div>
        	</div>
        </div>
      </div>

      <footer class="footer">
      	<div class="container-fluid">
        	<p class="copyright pull-right">
          	&copy; 2017 TV UFG | Diretor de Engenharia e Operações
          </p>
        </div>
      </footer>
		</div>

		<!-- Modal para cadastro de programa -->
		<div class="modal fade" id="cadastroPrograma" tabindex="-1" role="dialog" aria-labelledby="modalLabel">
			<div class="modal-dialog" role="document">
				<div class="modal-content">
					<div class="modal-header">
						<button type="button" class="close button-close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
						<h4 class="modal-title" id="modalLabel">Adicionar Programa</h4>
					</div>
					<div class="modal-body">
						<form id="form-programa">
							<div class="form-group" style="display:none;">
								<label for="titulo" class="control-label">Id:</label>
								<input type="number" class="form-control" id="id">
							</div>
							<div class="form-group"style="display: inline-block; margin-right: 20px; width:30%;">
								<label for="horario" class="control-label">Horário:</label>
								<input type="time" class="form-control" id="horario" required/>
							</div>
							<div class="form-group" style="display: inline-block; width:65.875%">
								<label for="titulo" class="control-label">Título:</label>
								<input type="text" class="form-control" id="titulo" required maxlength="100" autocomplete="off" style="">
								<span style="float: right;"><span class="cT">100</span><span> restantes</span></span>
							</div>
							<div class="form-group">
								<label for="titulo" class="control-label">Subtítulo:</label>
								<input type="text" class="form-control" id="subtitulo" maxlength="100" autocomplete="off">
								<span style="float: right;"><span class="cS">100</span><span> restantes</span></span>
							</div>
							<div class="form-group">
								<label for="descricao" class="control-label">Descrição:</label>
								<textarea class="form-control" id="descricao" required maxlength="500" autocomplete="off"></textarea>
								<span style="float: right;"><span class="cD">500</span><span> restantes</span></span>
							</div>
							<div class="form-group">
								<label for="" class="control-label">Descrição Complementar:</label>
								<br/>
								<label class="checkbox-inline">
									<input id="detalhes_filme" type="checkbox" name="detail" value="">Filme
								</label>
							</div>
							<div class="" id="filme" style="display: block;">
								<div class="form-group"style="display: inline-block; width:65.875%; margin-right: 20px;">
									<label for="titulo" class="control-label">Título Original:</label>
									<input type="text" class="form-control" id="titulo_original" maxlength="100" autocomplete="off" style="">
									<span style="float: right;"><span class="cTD">100</span><span> restantes</span></span>
								</div>
								<div class="form-group"style="display: inline-block; width:30%;">
									<label for="titulo" class="control-label">Direção:</label>
									<input type="text" class="form-control" id="direcao" maxlength="100" autocomplete="off">
									<span style="float: right;"><span class="cDD">100</span><span> restantes</span></span>
								</div>
								<div class="form-group"style="display: inline-block; width:100%;">
									<label for="titulo" class="control-label">Elenco:</label>
									<input type="text" class="form-control" id="elenco" maxlength="400" autocomplete="off">
									<span style="float: right;"><span class="cED">400</span><span> restantes</span></span>
								</div>
								<div class="form-group" style="display: inline-block; width:65.875%; margin-right: 20px;">
									<label for="titulo" class="control-label">Nacionalidade:</label>
									<input type="text" class="form-control" id="nacionalidade" maxlength="100" autocomplete="off">
									<span style="float: right;"><span class="cND">100</span><span> restantes</span></span>
								</div>
								<div class="form-group"style="display: inline-block; width:30%;">
									<label for="titulo" class="control-label">Gênero:</label>
									<input type="text" class="form-control" id="genero" maxlength="100" autocomplete="off">
									<span style="float: right;"><span class="cGD">100</span><span> restantes</span></span>
								</div>
								<!-- <div class="form-group" style="display: inline-block; width:65.875%">
									<label for="titulo" class="control-label">Outros:</label>
									<input type="text" class="form-control" id="outros" maxlength="100" autocomplete="off">
									<span style="float: right;"><span class="cOD">100</span><span> restantes</span></span>
								</div> -->
							</div>
							<div class="form-group">
								<label for="titulo" class="control-label">Link para site:</label>
								<input type="url" class="form-control" id="link" maxlength="200" autocomplete="off">
								<span style="float: right;"><span class="cL">200</span><span> restantes</span></span>
							</div>
							<div class="form-group">
								<label for="titulo" class="control-label">Link para mais episodios:</label>
								<input type="url" class="form-control" id="link_mais" maxlength="200" autocomplete="off">
								<span style="float: right;"><span class="cLM">200</span><span> restantes</span></span>
							</div>
							<div class="form-group">
								<label for="folder" class="control-label">Imagens:</label><br/>
								<div class="row">
									<div class="col-xs-6 col-sm-4">
										<img class="img-responsive" id="img-capa-pr" style="width: 94px; display: block; border-radius: 4px; margin:0px auto 10px auto;" src=""/>
										<input type="text" class="form-control" id="img-capa"  style="display: none;">
									</div>
									<div class="col-xs-6 col-sm-8">
										<img class="img-responsive" id="img-destaque-pr" style="width: 353px; display: block; border-radius: 4px; margin:0px auto 10px auto;" src=""/>
										<input type="text" class="form-control" id="img-destaque"  style="display: none;">
									</div>
								</div>
								<div class="row">
									<div class="col-xs-6 col-sm-4">
										<button style="display: block; margin:0px auto 10px auto;" type="button"class="btn btn-info btn-round btn-fill btn-sm" data-toggle="modal" data-target="#modal-galeria-capa">Imagem de Capa - 94px x 55px</button>
									</div>
									<div class="col-xs-6 col-sm-8">
										<div style="float: right">
											<button style="display: inline-block; margin:0px auto 10px auto;" type="button"class="btn btn-info btn-round btn-fill btn-sm" data-toggle="modal" data-target="#modal-galeria-destaque">Imagem de Destaque - 353px x 198px</button>
											<button id="rm-img-destaque" style="display: inline-block; margin:0px auto 10px auto;" type="button"class="btn btn-danger btn-round btn-simple btn-sm"><i class="fa fa-close"></i></button>
										</div>
									</div>
								</div>
							</div>
							<p style="margin-left:400px; ">ou</p>
							<div style="margin-bottom: 15px;">
								<input type="url" class="form-control" id="video-destaque" placeholder="Video de Destaque"maxlength="200" autocomplete="off" style="display: inline-block; width:224px; margin-left:300px; ">
								<button id="rm-video-destaque" style="display: inline-block; margin-right:0px;" type="button"class="btn btn-danger btn-round btn-simple btn-sm"><i class="fa fa-close"></i></button>
							</div>
							<div class="form-group" id="form-classificacao">
								<label for="" class="control-label">Classificação Indicativa:</label>
								<br/>
								<label class="radio-inline"><input type="radio" name="classificacao" value="1" required/>
									<img style="height: 25px;" src="../imagens/ER.png"/>
								</label>
								<label class="radio-inline"><input type="radio" name="classificacao" value="0" required/>
									<img style="height: 25px;" src="../imagens/0.png"/>
								</label>
								<label class="radio-inline"><input type="radio" name="classificacao" value="10" required/>
									<img style="height: 25px;" src="../imagens/10.png"/>
								</label>
								<label class="radio-inline"><input type="radio" name="classificacao" value="12" required/>
									<img style="height: 25px;" src="../imagens/12.png"/>
								</label>
								<label class="radio-inline"><input type="radio" name="classificacao" value="14" required/>
									<img style="height: 25px;" src="../imagens/14.png"/>
								</label>
								<label class="radio-inline"><input type="radio" name="classificacao" value="16" equired/>
									<img style="height: 25px;" src="../imagens/16.png"/>
								</label>
								<label class="radio-inline"><input type="radio" name="classificacao" value="18" required/>
									<img style="height: 25px;" src="../imagens/18.png"/>
								</label>
							</div>
							<!-- <div class="form-group" id="conteudo" style="display: none;">
								<label for="" class="control-label">Conteúdo:</label>
								<br/>
								<label class="checkbox-inline">
									<input id="violencia" type="checkbox" name="conteudo" value="V">Violência
								</label>
								<label class="checkbox-inline">
									<input id="sexo" type="checkbox" name="conteudo" value="S">Sexo
								</label>
								<label class="checkbox-inline">
									<input id="drogas" type="checkbox" name="conteudo" value="D">Drogas
								</label>
							</div> -->
							<div class="form-group">
								<label for="" class="control-label">Habilitar Acessibilidade:</label>
								<br/>
								<label class="checkbox-inline">
									<input id="cc" type="checkbox" name="conteudo" value="">Cosed Caption
								</label>
								<label class="checkbox-inline">
									<input id="ad" type="checkbox" name="conteudo" value="">Audiodescrição
								</label>
								<label class="checkbox-inline">
									<input id="ga" type="checkbox" name="conteudo" value="">Ginga App
								</label>
							</div>
						</form>

						<div class="modal-footer">
							<button type="button" class="btn btn-default button-close btn-fill" data-dismiss="modal">Fechar</button>
							<button type="submit" id="button-submit" form="form-programa" class="btn btn-primary btn-fill">Salvar</button>
						</div>
					</div>
				</div><!-- fim da modal de cadastro de programa -->
			</div>
		</div>

		<!-- Modal Galeria Capa-->
		<div class="modal fade" id="modal-galeria-capa" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  		<div class="modal-dialog modal-lg" role="document">
    		<div class="modal-content">
      		<div class="modal-header">
        		<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        		<h4 style="display: inline"class="modal-title" id="myModalLabel">Galeria</h4>
						<form id="searchForm" style="display: inline; float: right; margin-right: 15px;"class="" role="search" data-toggle="tooltip" data-placement="bottom" title="Disponível em breve!">
							<div class="input-group">
								<span class="input-group-addon"><i class="fa fa-search"></i></span>
								<input disabled type="text" value="" class="form-control" placeholder="Search...">
							</div>
						</form>
      		</div>
      		<div class="modal-body" style="height: 600px; overflow-y: scroll;">
						<select id="slt-img-capa" class="image-picker show-labels show-html" required>
							<?php
								$imagens = glob("../imagens_capa/*.*");
								foreach($imagens as $imagem){
									$nome_img = explode("/", $imagem);
									echo '<option data-img-label="'.$nome_img[2].'" data-img-src="'.$imagem.'" value="'.$imagem.'"></option>';
								}
				 			?>
			 			</select>
      		</div>
      		<div class="modal-footer">
        		<button type="button" class="btn btn-default btn-fill" data-dismiss="modal">Fechar</button>
        		<button id="btn-img-capa" type="button" class="btn btn-primary btn-fill">Salvar</button>
      		</div>
    		</div>
  		</div>
		</div>

		<!-- Modal Galeria Destaque-->
		<div class="modal fade" id="modal-galeria-destaque" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  		<div class="modal-dialog modal-lg" role="document">
    		<div class="modal-content">
      		<div class="modal-header">
        		<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        		<h4 style="display: inline"class="modal-title" id="myModalLabel">Galeria</h4>
						<form id="searchForm" style="display: inline; float: right; margin-right: 15px;"class="" role="search" data-toggle="tooltip" data-placement="bottom" title="Disponível em breve!">
							<div class="input-group">
								<span class="input-group-addon"><i class="fa fa-search"></i></span>
								<input disabled type="text" value="" class="form-control" placeholder="Search...">
							</div>
						</form>
      		</div>
      		<div class="modal-body" style="height: 600px; overflow-y: scroll;">
						<select id="slt-img-destaque" class="image-picker show-labels show-html" required>
							<?php
								$imagens = glob("../imagens_destaque/*.*");
								foreach($imagens as $imagem){
									$nome_img = explode("/", $imagem);
									echo '<option data-img-label="'.$nome_img[2].'" data-img-src="'.$imagem.'" value="'.$imagem.'"></option>';
								}
				 			?>
			 			</select>
      		</div>
      		<div class="modal-footer">
        		<button type="button" class="btn btn-default btn-fill" data-dismiss="modal">Fechar</button>
        		<button id="btn-img-destaque" type="button" class="btn btn-primary btn-fill">Salvar</button>
      		</div>
    		</div>
  		</div>
		</div>


		<!-- Modal Dia-->
		<div class="modal fade" id="modal-dia" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  		<div class="modal-dialog modal-sm" role="document">
    		<div class="modal-content">
      		<div class="modal-header">
        		<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        		<h4 class="modal-title" id="myModalLabel">Dia</h4>
      		</div>
      		<div class="modal-body">
						<form id="form-dia">
							<div class="form-group">
								<label for="titulo" class="control-label">Data:</label>
								<input type="date" class="form-control" id="data" required>
							</div>
						</form>
      		</div>
      		<div class="modal-footer">
        		<button type="button" class="btn btn-default" data-dismiss="modal">Fechar</button>
        		<button type="submit" id="btn-dia" form="form-dia" class="btn btn-primary">Salvar</button>
      		</div>
    		</div>
  		</div>
		</div>

		<!-- Modal Dia-->
		<div class="modal fade" id="modal-copia-dia" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  		<div class="modal-dialog modal-sm" role="document">
    		<div class="modal-content">
      		<div class="modal-header">
        		<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        		<h4 class="modal-title" id="myModalLabel">Copiar Dia</h4>
      		</div>
      		<div class="modal-body">
						<form id="form-dia-copia">
							<div class="form-group">
								<label for="titulo" class="control-label">Data:</label>
								<input type="text" class="form-control" id="data-copia-ref" disabled>
							</div>
							<div class="form-group">
								<label for="titulo" class="control-label">Para:</label>
								<input type="date" required class="form-control" id="data-copia">
							</div>
						</form>
      		</div>
      		<div class="modal-footer">
        		<button type="button" class="btn btn-default" data-dismiss="modal">Fechar</button>
        		<button type="button" id="btn-copia-dia" form="form-dia-copia" class="btn btn-primary">Salvar</button>
      		</div>
    		</div>
  		</div>
		</div>

	</div>
</body >

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

    <!--  Bootstrap Table Plugin    -->
  <script src="assets/js/bootstrap-table.js"></script>

	<!--  Plugin for DataTables.net  -->
  <script src="assets/js/jquery.datatables.js"></script>

  <!--  Full Calendar Plugin    -->
  <script src="assets/js/fullcalendar.min.js"></script>

  <!-- Light Bootstrap Dashboard Core javascript and methods -->
	<script src="assets/js/light-bootstrap-dashboard.js"></script>

	<script src="image-picker/image-picker.js"></script>
	<script src="assets/js/transition.js"></script>
	<script src="assets/js/zoom.js"></script>
	<script src="assets/js/dashboard.js"></script>
</html>
