<!--sidemenu-->
<div class="col-md-3 left_col">
  <div class="left_col scroll-view">
    <div class="navbar nav_title" style="border: 0;">
      <a href="index.php" class="site_title"><i class="fa fa-code"></i> <span>Almacen</span></a>
    </div>

    <div class="clearfix"></div>

    <!-- menu profile quick info -->
    <div class="profile">
      <div class="profile_pic">
        <img src="img/user.png" alt="..." class="img-circle profile_img">
      </div>
      <div class="profile_info">
        <span>Bienvenido,</span>
        <h2><?= $_SESSION['user'] ?></h2>
      </div>
    </div>
    <!-- /menu profile quick info -->

    <div class="clear"></div>

    <!-- sidebar menu -->
    <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
    <!--
      <div class="menu_section hidden">
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
    -->
      <div class="menu_section">
        <h3>Catalogos</h3>
        <ul class="nav side-menu">
          <li>
            <a href="articulos.php"><i class="fa fa-table"></i> Catalogo de Artículos</a>
          </li>
          <li>
            <a href="paquetes.php"><i class="fa fa-archive"></i> Paquetes</a>
          </li>
        </ul>
      </div>
      <div class="menu_section">
        <h3>Almacen</h3>
        <ul class="nav side-menu">
          <li>
            <a href="existencias.php"><i class="fa fa-calendar-check-o"></i> Inventario Diario</a>
          </li>
          <li>
            <a href="salida_almacen.php"><i class="fa fa-th-list"></i> Crear Salida de Almacen</a>
          </li>
        </ul>
      </div>
      <div class="menu_section">
        <h3>Organización</h3>
        <ul class="nav side-menu">
          <li>
            <a href="panel.php"><i class="fa fa-bar-chart"></i> Reportes</a>
          </li>
          <li>
            <a href="sucursales.php"><i class="fa fa-building-o"></i> Sucursales</a>
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
      <a data-toggle="tooltip" data-placement="top" title="Logout" id="submit_logout">
        <span class="glyphicon glyphicon-off" aria-hidden="true"></span>
      </a>
    </div>
    <!-- /menu footer buttons -->
  </div>
</div>
<!--/sidemenu-->
