<?php
require_once(__DIR__.'/classes/autoloader.php');
require_once(__DIR__.'/config.php');

if(!isset($_SESSION['user'])){
  header('Location: '.'index.php');
}
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title><?= $_SESSION['user'] ?> | </title>

    <!-- Bootstrap -->
    <link href="css/bootstrap/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="css/font-awesome.min.css" rel="stylesheet">
    <!-- NProgress -->
    <link href="css/nprogress.css" rel="stylesheet">
    <!-- iCheck -->
    <link href="css/iCheck/skins/flat/green.css" rel="stylesheet">
    <!-- bootstrap-progressbar -->
    <link href="css/bootstrap/bootstrap-progressbar-3.3.4.min.css" rel="stylesheet">
    <!-- JQVMap -->
    <link href="css/jqvmap/jqvmap.min.css" rel="stylesheet" />
    <!-- bootstrap-daterangepicker -->
    <link href="css/bootstrap/daterangepicker.css" rel="stylesheet">
    <!-- Custom Theme Style -->
    <link href="css/custom.css" rel="stylesheet">
    <link href="css/helpers.css" rel="stylesheet">
  </head>

  <body class="nav-md">
    <div class="container body">
      <div class="main_container">
        <div class="col-md-3 left_col">
          <div class="left_col scroll-view">
            <div class="navbar nav_title" style="border: 0;">
              <a href="index.php" class="site_title"><i class="fa fa-code"></i> <span>Almacen</span></a>
            </div>

            <div class="clearfix"></div>

            <!-- menu profile quick info -->
            <div class="profile">
              <div class="profile_pic">
                <img src="img/img.jpg" alt="..." class="img-circle profile_img">
              </div>
              <div class="profile_info">
                <span>Welcome,</span>
                <h2><?= $_SESSION['user'] ?></h2>
              </div>
            </div>
            <!-- /menu profile quick info -->

            <div class="clear"></div>

            <!-- sidebar menu -->
            <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">

              <div class="menu_section">
                <h3>Almacen</h3>
                <ul class="nav side-menu">
                  <li><a><i class="fa fa-bug"></i> Inventario Almacen <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                      <li><a href="reporte_inventario.php">Reporte</a></li>
                      <li><a href="existencias_almacen.php">Existencias</a></li>
                      <li><a href="salidas_almacen.php">Salidas de Almacen</a></li>
                    </ul>
                  </li>
                  <li><a><i class="fa fa-bug"></i> Sucursales <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                      <li><a href="reporte_inventario.php">Reporte Inventario</a></li>
                      <li><a href="salidas_almacen.php">Reporte de Ventas</a></li>
                    </ul>
                  </li>
                  <li><a><i class="fa fa-windows"></i> Extras <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                      <li><a href="page_403.php">403 Error</a></li>
                      <li><a href="page_404.php">404 Error</a></li>
                      <li><a href="page_500.php">500 Error</a></li>
                      <li><a href="plain_page.php">Plain Page</a></li>
                      <li><a href="login.php">Login Page</a></li>
                      <li><a href="pricing_tables.php">Pricing Tables</a></li>
                    </ul>
                  </li>
                </ul>
              </div>

              <div class="menu_section">
                <h3>Organización</h3>
                <ul class="nav side-menu">
                  <li><a href="panel.php"><i class="fa fa-home"></i> Reportes</a>
                    <!--<ul class="nav child_menu hidden">
                      <li><a href="#"></a></li>
                      <li><a href="#"></a></li>
                      <li><a href="#"></a></li>
                    </ul>-->
                  </li>
                  <li><a href="articulos.php"><i class="fa fa-edit"></i> Artículos</a>
                  </li>
                  <li><a href="categorias.php"><i class="fa fa-desktop"></i> Categorías</a>
                  </li>
                  <li><a href="paquetes.php"><i class="fa fa-table"></i> Paquetes</a>
                  </li>
                  <li><a href="sucursales.php"><i class="fa fa-bar-chart-o"></i> Sucursales</a>
                  </li>
                  <li><a href="nuevo_usuario.php"><i class="fa fa-users"></i> Usuarios</span></a>
                  </li>
                </ul>
              </div>
            </div>
            <!-- /sidebar menu -->

            <!-- /menu footer buttons -->
            <div class="sidebar-footer hidden-small">
              <a data-toggle="tooltip" data-placement="top" title="Settings">
                <span class="glyphicon glyphicon-cog" aria-hidden="true"></span>
              </a>
              <a data-toggle="tooltip" data-placement="top" title="FullScreen">
                <span class="glyphicon glyphicon-fullscreen" aria-hidden="true"></span>
              </a>
              <a data-toggle="tooltip" data-placement="top" title="Lock">
                <span class="glyphicon glyphicon-eye-close" aria-hidden="true"></span>
              </a>
              <a data-toggle="tooltip" data-placement="top" title="Logout">
                <span class="glyphicon glyphicon-off" aria-hidden="true"></span>
              </a>
            </div>
            <!-- /menu footer buttons -->
          </div>
        </div>

        <!-- top navigation -->
        <div class="top_nav">
          <div class="nav_menu">
            <nav>
              <div class="nav toggle">
                <a id="menu_toggle"><i class="fa fa-bars"></i></a>
              </div>

              <ul class="nav navbar-nav navbar-right">
                <li class="">
                  <a href="javascript:;" class="user-profile dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                    <img src="img/img.jpg" alt=""><?= $_SESSION['user'] ?>
                    <span class=" fa fa-angle-down"></span>
                  </a>
                  <ul class="dropdown-menu dropdown-usermenu pull-right">
                    <li><a href="javascript:;"> Profile</a></li>
                    <li>
                      <a href="javascript:;">
                        <span class="badge bg-red pull-right">50%</span>
                        <span>Settings</span>
                      </a>
                    </li>
                    <li><a href="javascript:;">Help</a></li>
                    <li><a href="login.php"><i class="fa fa-sign-out pull-right"></i> Log Out</a></li>
                  </ul>
                </li>

                <li role="presentation" class="dropdown">
                  <a href="javascript:;" class="dropdown-toggle info-number" data-toggle="dropdown" aria-expanded="false">
                    <i class="fa fa-envelope-o"></i>
                    <span class="badge bg-green">6</span>
                  </a>
                  <ul id="menu1" class="dropdown-menu list-unstyled msg_list" role="menu">
                    <li>
                      <a>
                        <span class="image"><img src="img/img.jpg" alt="Profile Image" /></span>
                        <span>
                          <span>John Smith</span>
                        <span class="time">3 mins ago</span>
                        </span>
                        <span class="message">
                          Film festivals used to be do-or-die moments for movie makers. They were where...
                        </span>
                      </a>
                    </li>
                    <li>
                      <a>
                        <span class="image"><img src="img/img.jpg" alt="Profile Image" /></span>
                        <span>
                          <span>John Smith</span>
                        <span class="time">3 mins ago</span>
                        </span>
                        <span class="message">
                          Film festivals used to be do-or-die moments for movie makers. They were where...
                        </span>
                      </a>
                    </li>
                    <li>
                      <a>
                        <span class="image"><img src="img/img.jpg" alt="Profile Image" /></span>
                        <span>
                          <span>John Smith</span>
                        <span class="time">3 mins ago</span>
                        </span>
                        <span class="message">
                          Film festivals used to be do-or-die moments for movie makers. They were where...
                        </span>
                      </a>
                    </li>
                    <li>
                      <a>
                        <span class="image"><img src="img/img.jpg" alt="Profile Image" /></span>
                        <span>
                          <span>John Smith</span>
                        <span class="time">3 mins ago</span>
                        </span>
                        <span class="message">
                          Film festivals used to be do-or-die moments for movie makers. They were where...
                        </span>
                      </a>
                    </li>
                    <li>
                      <div class="text-center">
                        <a>
                          <strong>See All Alerts</strong>
                          <i class="fa fa-angle-right"></i>
                        </a>
                      </div>
                    </li>
                  </ul>
                </li>
              </ul>
            </nav>
          </div>
        </div>
        <!-- /top navigation -->

        <!-- page content -->
        <div class="right_col" role="main">
          <div class="row">
            <div class="col-lg-12">
              <div class="x_panel">
                  <div class="x_title">
                    <h2>Agregar usuario <small>Gerente de Sucursal</small></h2>
                    <ul class="nav navbar-right panel_toolbox hidden">
                      <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                      </li>
                      <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-wrench"></i></a>
                        <ul class="dropdown-menu" role="menu">
                          <li><a href="#">Settings 1</a>
                          </li>
                          <li><a href="#">Settings 2</a>
                          </li>
                        </ul>
                      </li>
                      <li><a class="close-link"><i class="fa fa-close"></i></a>
                      </li>
                    </ul>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">

                    <form class="form-horizontal form-label-left" novalidate="">
                      <span class="section">Datos de usuario</span>
                      <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name_newUser">Nombre <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input id="name_newUser" class="form-control col-md-7 col-xs-12" data-validate-length-range="6" data-validate-words="2" name="name_newUser" placeholder="Nombre completo" required="required" type="text">
                        </div>
                      </div>
                      <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="email_newUser">Correo <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="email" id="email_newUser" name="email_newUser" required="required" class="form-control col-md-7 col-xs-12">
                        </div>
                      </div>
                      <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="username_newUser">Usuario <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="text" id="username_newUser" name="username_newUser" required="required" class="form-control col-md-7 col-xs-12">
                        </div>
                      </div>
                      <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="telephone_newUser">Telephone <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="tel" id="telephone_newUser" name="telephone_newUser" required="" data-validate-length-range="8,20" class="form-control col-md-7 col-xs-12">
                        </div>
                      </div>
                      <div class="item form-group">
                        <label for="password_newUser" class="control-label col-md-3 col-sm-3 col-xs-12">Password</label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <div class="input-group">
                            <input id="password_newUser" type="password" name="password_newUser" data-validate-length="6,8" class="form-control" required="required">
                            <span class="input-group-btn">
                              <button type="button" class="btn btn-primary"><span class="fa fa-lock s20nr"></span></button>
                            </span>
                          </div>
                        </div>
                      </div>
                      <div class="ln_solid"></div>
                      <div class="form-group">
                        <div class="col-md-6 col-md-offset-3">
                          <input type="hidden" name="rol_newUser" id="rol_newUser" value="1">
                          <button type="button" class="btn btn-primary">Cancelar</button>
                          <button id="addNewUser" type="submit" class="btn btn-success">Guardar</button>
                        </div>
                      </div>
                    </form>
                  </div>
                </div>
            </div>
          </div>
        </div>
        <!-- page content -->

        <footer>
          <div class="pull-right">
            Control de Almacen - by <a href="https://unbound-it.com">Unbound-IT</a>
          </div>
          <div class="clearfix"></div>
        </footer>
        <!-- /footer content -->
      </div>
    </div>

    <!-- jQuery -->
    <script src="js/jquery.min.js"></script>
    <!-- Bootstrap -->
    <script src="js/bootstrap/bootstrap.min.js"></script>
    <!-- FastClick -->
    <script src="js/fastclick.js"></script>
    <!-- NProgress -->
    <script src="js/nprogress.js"></script>
    <!-- Chart.js -->
    <script src="js/Chart.js/Chart.min.js"></script>
    <!-- gauge.js -->
    <script src="js/gauge.js/gauge.min.js"></script>
    <!-- bootstrap-progressbar -->
    <script src="js/bootstrap/bootstrap-progressbar.min.js"></script>
    <!-- iCheck -->
    <script src="js/iCheck/icheck.min.js"></script>
    <!-- Skycons -->
    <script src="js/skycons/skycons.js"></script>
    <!-- Flot -->
    <script src="js/flot/jquery.flot.js"></script>
    <script src="js/flot/jquery.flot.pie.js"></script>
    <script src="js/flot/jquery.flot.time.js"></script>
    <script src="js/flot/jquery.flot.stack.js"></script>
    <script src="js/flot/jquery.flot.resize.js"></script>
    <!-- Flot pluins-->
    <script src="js/flot/plugins/jquery.flot.orderBars.js"></script>
    <script src="js/flot/plugins/jquery.flot.spline.min.js"></script>
    <script src="js/flot/plugins/curvedLines.js"></script>
    <!-- DateJS -->
    <script src="js/DateJS/date.js"></script>
    <!-- JQVMap -->
    <script src="js/jqvmap/jquery.vmap.js"></script>
    <script src="js/jqvmap/maps/jquery.vmap.world.js"></script>
    <script src="js/jqvmap/examples/js/jquery.vmap.sampledata.js"></script>
    <!-- bootstrap-daterangepicker -->
    <script src="js/moment/min/moment.min.js"></script>
    <script src="js/bootstrap/daterangepicker.js"></script>
    <!-- validator -->
    <script src="js/validator/validator.js"></script>
    <!-- Custom Theme Scripts -->
    <script src="js/scripts.js"></script>
    <script src="js/custom.js"></script>
    <!-- validator -->
    <script>
      // initialize the validator function
      validator.message.date = 'not a real date';

      // validate a field on "blur" event, a 'select' on 'change' event & a '.reuired' classed multifield on 'keyup':
      $('form')
        .on('blur', 'input[required], input.optional, select.required', validator.checkField)
        .on('change', 'select.required', validator.checkField)
        .on('keypress', 'input[required][pattern]', validator.keypress);

      $('.multi.required').on('keyup blur', 'input', function() {
        validator.checkField.apply($(this).siblings().last()[0]);
      });

      $('form').submit(function(e) {
        e.preventDefault();

        // evaluate the form using generic validaing
        if (!validator.checkAll($(this))) {
          submit = false;
        }
        if (submit)
          newUser();
        return false;
      });
    </script>
    <!-- /validator -->
  </body>

</html>
