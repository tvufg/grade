<!doctype html>
<html lang="pt-br">
  <head>
    <meta charset="utf-8" />
    <link rel="icon" type="image/png" href="../imagens/favicon.ico">
    <link rel="apple-touch-icon" sizes="76x76" href="../imagens/favicon.png">
    <meta name="author" content="Matheus Pimenta (matheuspiment@hotmail.com)">

    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />

    <title>Programação</title>

    <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0' name='viewport' />
    <meta name="viewport" content="width=device-width" />

    <link href="assets/css/bootstrap.min.css" rel="stylesheet" />
    <link href="assets/css/tooltip.css" rel="stylesheet" />
    <link href="assets/css/paper-kit.css" rel="stylesheet"/>
    <link href="assets/css/programacao.css" rel="stylesheet"/>

    <!--     Fonts and icons     -->
    <link href='http://fonts.googleapis.com/css?family=Montserrat:400,300,700' rel='stylesheet' type='text/css'>
    <link href="http://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css" rel="stylesheet">
    <link href="assets/css/nucleo-icons.css" rel="stylesheet">

  </head>
  <body class="profile" style="background-color: white;">
    <nav style="box-shadow: none;"class="navbar navbar-toggleable-md fixed-top bg-info" color-on-scroll="0">
      <div class="container">
        <div class="navbar-translate">
          <button class="navbar-toggler navbar-toggler-right navbar-burger" type="button" data-toggle="collapse" data-target="#navbarToggler" aria-controls="navbarTogglerDemo02" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-bar"></span>
          <span class="navbar-toggler-bar"></span>
          <span class="navbar-toggler-bar"></span>
          </button>
          <div class="navbar-header">
            <a class="navbar-brand" href="#" style="opacity: 1;">
            <img class="brand-img" alt="Brand" src="../imagens/logomark-white.png">
            </a>
          </div>
        </div>

        <div class="collapse navbar-collapse">
          <!-- <ul class="navbar-nav ml-auto">
            <li class="nav-item dropdown dropdown-danger">
              <a class="nav-link dropdown-toggle" href="javascript:void(0)" data-toggle="dropdown">Dropdown</a>
              <ul class="dropdown-menu dropdown-menu-right dropdown-danger">
                <li class="dropdown-item"><a href="#"><i class="nc-icon nc-tile-56"></i>&nbsp; Link</a></li>
                <li class="dropdown-item"><a href="#"><i class="nc-icon nc-settings"></i>&nbsp; Another Link</a></li>
                <li class="dropdown-item"><a href="#"><i class="nc-icon nc-bullet-list-67"></i>&nbsp; Page</a></li>
              </ul>
            </li>
            <form class="form-inline">
              <input class="form-control mr-sm-2 no-border" type="text" placeholder="Search" style="border-radius: 20px;">
              <button type="submit" class="btn btn-primary btn-just-icon btn-round"><i class="nc-icon nc-zoom-split"></i></button>
            </form>
          </ul> -->
        </div>

      </div>
    </nav>

    <div class="grade-piker" color-on-scroll="0" style="top:100px;position: fixed;width: inherit;  box-shadow: 0px 4px 6px -4px rgba(0, 0, 0, 0.15); background-color: white; z-index: 10;">
      <div class="container dataPiker">
        <div class="data-controller col-md-8 offset-md-2 col-sm-10 offset-sm-1" style=" -webkit-user-select: none; text-align: center; padding-top: 0.5rem; padding-bottom: 0.5rem; display: inline-block;">
          <button id="lastDay" style="outline: none; border: none; background: none; font-size: 24px; cursor: pointer; color: #009de0;"><i style="font-weight: bold; "class="fa fa-angle-left"></i></button>
          <p id="data" style="margin-bottom: 0px; font-size: 19px; font-weight: 700; display: inline-block; padding-left: 30px; padding-right: 30px; color: black;"></p>
          <button id="nextDay" style="outline: none; border: none; background: none; font-size: 24px; cursor: pointer; color: #009de0;"><i style="font-weight: bold;" class="fa fa-angle-right"></i></button>
        </div>
        <a id="download-grade" href="" download style="display: inline-block;"><i class="fa fa-download" style="margin-right: 5px;"></i>Baixe a programação</a>
      </div>
    </div>

    <div class="wrapper" style="margin-top: 155px;">
      <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true" style="background-color: white;"></div>
    </div>

    <div style="height: 250px;"></div>

    <!-- <footer class="footer footer-black footer-big">
      <div class="container">
        <div class="row">
          <div class="col-md-2 text-center col-sm-3 col-xs-12">
            <img class="brand-footer" src="../imagens/logomark-white.png" />
            <div class="social-area">
              <a class="btn btn-just-icon btn-round btn-facebook">
              <i class="fa fa-facebook" aria-hidden="true"></i>
              </a>
              <a class="btn btn-just-icon btn-round btn-twitter">
              <i class="fa fa-twitter" aria-hidden="true"></i>
              </a>
              <a class="btn btn-just-icon btn-round btn-google">
              <i class="fa fa-google-plus" aria-hidden="true"></i>
              </a>
            </div>
          </div>

          <div class="col-md-9 offset-md-1 col-sm-9 col-xs-12">
            <div class="row">
              <div class="col-md-3 col-sm-3 col-xs-6">
                <div class="links">
                  <ul class="uppercase-links stacked-links">
                    <li>
                      <a href="#" >
                      Home
                      </a>
                    </li>
                    <li>
                      <a href="#">
                      Discover
                      </a>
                    </li>
                    <li>
                      <a href="#">
                      Blog
                      </a>
                    </li>
                    <li>
                      <a href="">
                      Live Support
                      </a>
                    </li>
                    <li>
                      <a href="#">
                      Money Back
                      </a>
                    </li>
                  </ul>
                </div>
              </div>
              <div class="col-md-3 col-sm-3 col-xs-6">
                <div class="links">
                  <ul class="uppercase-links stacked-links">
                    <li>
                      <a href="#">
                      Contact Us
                      </a>
                    </li>
                    <li>
                      <a href="#">
                      We're Hiring
                      </a>
                    </li>
                    <li>
                      <a href="#">
                      About Us
                      </a>
                    </li>
                  </ul>
                </div>
              </div>
              <div class="col-md-3 col-sm-3 col-xs-6">
                <div class="links">
                  <ul class="uppercase-links stacked-links">
                    <li>
                      <a href="#">
                      Portfolio
                      </a>
                    </li>
                    <li>
                      <a href="#">
                      How it works
                      </a>
                    </li>
                    <li>
                      <a href="#">
                      Testimonials
                      </a>
                    </li>
                  </ul>
                </div>
              </div>
            </div>
            <hr />
            <div class="copyright">
              <div class="pull-left">
                &copy; <script>document.write(new Date().getFullYear())</script> Departamento de Engenharia e Programação - TV UFG
              </div>
              <div class="links pull-right">
                <ul>
                  <li>
                    <a href="#">
                    Company Policy
                    </a>
                  </li>
                  |
                  <li>
                    <a href="#">
                    Terms
                    </a>
                  </li>
                  |
                  <li>
                    <a href="#">
                    Privacy
                    </a>
                  </li>
                </ul>
              </div>
            </div>
          </div>
        </div>
      </div>
    </footer> -->
  </body>
  <!-- Core JS Files -->
  <script src="assets/js/jquery-3.2.1.min.js" type="text/javascript"></script>
  <script src="assets/js/jquery-ui-1.12.1.custom.min.js" type="text/javascript"></script>
  <script src="assets/js/tether.min.js" type="text/javascript"></script>
  <script src="assets/js/bootstrap.min.js" type="text/javascript"></script>
  <script src="assets/js/paper-kit.js?v=2.0.0"></script>
  <script src="assets/js/tooltip.js" type="text/javascript"></script>
  <script src="assets/js/programacao.js"></script>
</html>
