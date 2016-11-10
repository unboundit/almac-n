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
              <a href="index.html" class="site_title"><i class="fa fa-code"></i> <span>Almacen</span></a>
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
                      <li><a href="reporte_inventario.html">Reporte</a></li>
                      <li><a href="existencias_almacen.html">Existencias</a></li>
                      <li><a href="salidas_almacen.html">Salidas de Almacen</a></li>
                    </ul>
                  </li>
                  <li><a><i class="fa fa-bug"></i> Sucursales <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                      <li><a href="reporte_inventario.html">Reporte Inventario</a></li>
                      <li><a href="salidas_almacen.html">Reporte de Ventas</a></li>
                    </ul>
                  </li>
                  <li><a><i class="fa fa-windows"></i> Extras <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                      <li><a href="page_403.html">403 Error</a></li>
                      <li><a href="page_404.html">404 Error</a></li>
                      <li><a href="page_500.html">500 Error</a></li>
                      <li><a href="plain_page.html">Plain Page</a></li>
                      <li><a href="login.html">Login Page</a></li>
                      <li><a href="pricing_tables.html">Pricing Tables</a></li>
                    </ul>
                  </li>
                </ul>
              </div>

              <div class="menu_section">
                <h3>Organización</h3>
                <ul class="nav side-menu">
                  <li><a href="panel.html"><i class="fa fa-home"></i> Reportes</a>
                    <!--<ul class="nav child_menu hidden">
                      <li><a href="#"></a></li>
                      <li><a href="#"></a></li>
                      <li><a href="#"></a></li>
                    </ul>-->
                  </li>
                  <li><a href="articulos.html"><i class="fa fa-edit"></i> Artículos</a>
                  </li>
                  <li><a href="categorias.html"><i class="fa fa-desktop"></i> Categorías</a>
                  </li>
                  <li><a href="paquetes.html"><i class="fa fa-table"></i> Paquetes</a>
                  </li>
                  <li><a href="sucursales.html"><i class="fa fa-bar-chart-o"></i> Sucursales</a>
                  </li>
                  <li><a href="usuarios.html"><i class="fa fa-bar-chart-o"></i> Usuarios</span></a>
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
                    <li><a href="login.html"><i class="fa fa-sign-out pull-right"></i> Log Out</a></li>
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
          <div class="row tile_count">
            <div class="z-col-lg-3 col-md-3 col-sm-4 col-xs-4 tile_stats_count">
              <span class="count_top"><i class="fa fa-user"></i> Artículos Totales</span>
              <div class="count">2500</div>
              <!--<span class="count_bottom"><i class="green">4% </i> From last Week</span>-->
            </div>
            <div class="z-col-lg-3 z-col-md-3 z-col-sm-4 z-col-xs-4 pull-right noMargin">
              <div class="z-block h100">
                <div class="z-content z-contentMiddle">
                  <button type="button" data-toggle="modal" data-target="#newArtModal" class="z-btn bgGreen cWhite s20">Agregar Artículo <span class="fa fa-plus text-bold"></span></button>
                </div>
              </div>
            </div>
          </div>
        </div>
        <!-- page content -->

        <!-- modals -->
        <div class="modal fade" id="newArtModal" tabindex="-1" role="dialog" aria-labelledby="newArtLabel">
          <div class="modal-dialog" role="document">
            <form id="newArtForm" class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="newArtLabel">Agregar un artículo al catálogo</h4>
              </div>
              <div class="modal-body">
                <div class="form-horizontal form-label-left">
                  <div class="form-group">
                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="nombre_articulo">Nombre Artículo <span class="required">*</span>
                    </label>
                    <div class="col-md-6 col-sm-6 col-xs-12">
                      <input type="text" id="nombre_articulo" name="nombre_articulo" required="required" class="form-control col-md-7 col-xs-12">
                    </div>
                  </div>
                  <div class="form-group">
                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="descripcion_articulo">Descripción <span class="required">*</span>
                    </label>
                    <div class="col-md-6 col-sm-6 col-xs-12">
                      <textarea id="descripcion_articulo" name="descripcion_articulo" required="required" class="form-control col-md-7 col-xs-12" rows="8" cols="40"></textarea>
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="unidades_articulo" class="control-label col-md-3 col-sm-3 col-xs-12">Unidades</label>
                    <div class="col-md-6 col-sm-6 col-xs-12">
                      <input id="unidades_articulo" name="unidades_articulo" class="form-control col-md-7 col-xs-12" type="text">
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="escala_articulo" class="control-label col-md-3 col-sm-3 col-xs-12">Escala</label>
                    <div class="col-md-6 col-sm-6 col-xs-12">
                      <input id="escala_articulo" name="escala_articulo" class="form-control col-md-7 col-xs-12" type="text">
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="tamaño_articulo" class="control-label col-md-3 col-sm-3 col-xs-12">Tamaño</label>
                    <div class="col-md-6 col-sm-6 col-xs-12">
                      <input id="tamaño_articulo" name="tamaño_articulo" class="form-control col-md-7 col-xs-12" type="text">
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="categoria_articulo" class="control-label col-md-3 col-sm-3 col-xs-12">Categoria</label>
                    <div class="col-md-6 col-sm-6 col-xs-12">
                      <select id="categoria_articulo" name="categoria_articulo" class="form-control col-md-7 col-xs-12">
                        <option value="volvo">seleccionar</option>
                        <option value="saab">de las categorias</option>
                        <option value="mercedes">que sacamos</option>
                        <option value="audi">de la hoja</option>
                      </select>
                    </div>
                  </div>
                  <div class="form-group">
                    <label class="control-label col-md-3 col-sm-3 col-xs-12">¿Materia Prima o conformada?</label>
                    <div class="col-md-6 col-sm-6 col-xs-12">
                      <div id="tipo_articulo" class="btn-group" data-toggle="buttons">
                        <label class="">
                          <input type="radio" name="tipo_articulo" value="0"> &nbsp; Prima &nbsp;
                        </label>
                        <label>
                          <input type="radio" name="tipo_articulo" value="1"> Conformada
                        </label>
                      </div>
                    </div>
                  </div>
                  <div class="ln_solid"></div>
                </div>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                <button type="button" id="saveNewArticle" class="btn btn-primary">Save changes</button>
              </div>
            </form><!-- /.modal-content -->
          </div><!-- /.modal-dialog -->
        </div><!-- /.modal -->
        <!-- modals -->

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
    <!-- Custom Theme Scripts -->
    <script src="js/scripts.js"></script>
    <script src="js/custom.js"></script>
  </body>

</html>
