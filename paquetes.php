<?php
require_once(__DIR__.'/classes/autoloader.php');
require_once(__DIR__.'/config.php');

if(!isset($_SESSION['user'])){
  header('Location: '.'index.php');
}
?>

<?php include __DIR__.'/header.php'; ?>

  <div id="paquetes" class="right_col" role="main">
    <div class="row tile_count">
      <?php $articulos = almacen::getSumTotPaquetes();
        foreach ($articulos as $key => $value) { ?>
        <div class="z-col-lg-3 col-md-3 col-sm-4 col-xs-6 tile_stats_count">
          <span class="count_top"><i class="fa fa-user"></i> <?= $articulos[$key]['ids'] ?>  Paquetes Totales de <?= $articulos[$key]['nombre'] ?></span>
          <div class="count"><?= $articulos[$key]['suma'] ?></div>
          <!--<span class="count_bottom"><i class="green">4% </i> From last Week</span>-->
        </div>
      <?php } ?>
      <div class="z-col-lg-4 z-col-md-4 z-col-sm-6 z-col-xs-6 pull-right noMargin">
        <div class="z-block h100">
          <div class="z-content z-contentMiddle">
            <button type="button" data-toggle="modal" data-target="#newPaqModal" class="btn btn-success cWhite s20 pull-right noMargin">Agregar Paquete <span class="fa fa-plus text-bold"></span></button>
          </div>
        </div>
      </div>
    </div>
    <div class="row">
      <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
        <div class="x_panel">
          <div class="x_title">
            <h2>Catalogo de Paquetes <small>Listado de diferentes articulos empaquetados</small></h2>
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
            <div class="table-responsive">
              <table class="table table-striped jambo_table bulk_action">
                <thead>
                  <tr class="headings">
                    <th class="column-title">id </th>
                    <th class="column-title">Descripción </th>
                    <th class="column-title">Articulos</th>
                    <th class="column-title last">Cantidad</th>
                    <th class="bulk-actions" colspan="7">
                      <a class="antoo" style="color:#fff; font-weight:500;">Acciones en Grupo ( <span class="action-cnt"> </span> ) <i class="fa fa-chevron-down"></i></a>
                      <div class="pull-right noMargin">
                        <a role="button" class="cWhite"><span class="fa fa-trash s20"></span></a>
                        &nbsp;
                        <a role="button" class="cWhite"><span class="fa fa-edit s20"></span></a>
                      </div>
                    </th>
                  </tr>
                </thead>

                <tbody>
                  <?php $articulos = almacen::getPaquetes();
                  foreach ($articulos as $key => $value) { ?>
                    <tr class="even pointer">
                      <td class=" "><?= $articulos[$key]['id_paquetes'] ?></td>
                      <td class=" "><?= $articulos[$key]['descripcion'] ?></td>
                      <td class=" "><?= $articulos[$key]['nombre'] ?></td>
                      <td class=" last"><?= $articulos[$key]['cantidad'] ?></td>
                    </tr>
                  <?php } ?>
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

<?php include __DIR__.'/footer.php'; ?>

<!-- modals -->
  <div class="modal fade" id="newPaqModal" tabindex="-1" role="dialog" aria-labelledby="newPaqLabel">
    <div class="modal-dialog" role="document">
      <form id="newPaqForm" class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
          <h4 class="modal-title" id="newPaqLabel">Agregar un paquete al catálogo</h4>
        </div>
        <div class="modal-body">
          <div class="form-horizontal form-label-left">
            <div class="form-group">
              <label class="control-label col-lg-3 col-md-3 col-sm-3 col-xs-12" for="nombre_paquete">Nombre Paquete <span class="required">*</span>
              </label>
              <div class="col-lg-9 col-md-9 col-sm-9 col-xs-12">
                <input type="text" id="nombre_paquete" name="nombre_paquete" required="required" class="form-control col-md-7 col-xs-12">
              </div>
            </div>
            <div class="form-group">
              <label class="control-label col-lg-3 col-md-3 col-sm-3 col-xs-12" for="descripcion_paquete">Descripción <span class="required">*</span>
              </label>
              <div class="col-lg-9 col-md-9 col-sm-9 col-xs-12">
                <textarea id="descripcion_paquete" name="descripcion_paquete" required="required" class="form-control col-md-7 col-xs-12" rows="8" cols="40"></textarea>
              </div>
            </div>
            <div class="form-group">
              <label for="articulo_paquete" class="control-label col-lg-3 col-md-3 col-sm-3 col-xs-12">Artículos</label>
              <div class="col-lg-9 col-md-9 col-sm-9 col-xs-12">
                <select id="articulo_paquete" name="articulo_paquete" class="form-control col-md-7 col-xs-12">
                  <option value="">_</option>
                  <?php $articulos = almacen::getArticulos();
                  foreach ($articulos as $key => $value) { ?>
                    <option value="<?= $articulos[$key]['id_articulo'] ?>"><?= $articulos[$key]['nombre'] ?></option>
                  <?php } ?>
                </select>
              </div>
            </div>
            <div class="form-group">
              <label class="control-label col-lg-3 col-md-3 col-sm-3 col-xs-12" for="cantidad_paquete">Cantidad <span class="required">*</span>
              </label>
              <div class="col-lg-9 col-md-9 col-sm-9 col-xs-12">
                <input type="number" id="cantidad_paquete" name="cantidad_paquete" required="required" class="form-control col-md-7 col-xs-12">
              </div>
            </div>
            <div class="ln_solid"></div>
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
          <button type="button" id="saveNewPaquete" class="btn btn-primary">Save changes</button>
        </div>
      </form><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
  </div><!-- /.modal -->
  <!-- modals -->
