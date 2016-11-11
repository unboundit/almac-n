<?php
require_once(__DIR__.'/classes/autoloader.php');
require_once(__DIR__.'/config.php');

if(!isset($_SESSION['user'])){
  header('Location: '.'index.php');
}
?>

<?php include __DIR__.'/header.php'; ?>

  <div id="nuevo_usuario" class="right_col" role="main">
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
                  <button id="addNewUser" type="button" class="btn btn-success">Guardar</button>
                </div>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>

<?php include __DIR__.'/footer.php'; ?>
