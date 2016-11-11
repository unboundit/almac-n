<?php
require_once(__DIR__.'/classes/autoloader.php');
require_once(__DIR__.'/config.php');

if(!isset($_SESSION['user'])){
  header('Location: '.'index.php');
}
?>

<?php include __DIR__.'/header.php'; ?>

  <div id="articulos" class="right_col" role="main">
    <div class="row tile_count">
     <?php $articulos = almacen::getSumArticulos();
     foreach ($articulos as $key => $value) { ?>
      <div class="z-col-lg-3 col-md-3 col-sm-4 col-xs-6 tile_stats_count">
       
        <span class="count_top"><i class="fa fa-user"></i> Artículos <?= $articulos[$key]['nombre'] ?></span>
        <div class="count"><?= $articulos[$key]['suma'] ?></div>
        <!--<span class="count_bottom"><i class="green">4% </i> From last Week</span>-->
      </div>
      <?php } ?>
      <div class="z-col-lg-3 z-col-md-3 z-col-sm-4 z-col-xs-6 pull-right noMargin">
        <div class="z-block h100">
          <div class="z-content z-contentMiddle">
            <button type="button" data-toggle="modal" data-target="#newArtModal" class="btn btn-success cWhite s20 pull-right noMargin">Agregar Artículo <span class="fa fa-plus text-bold"></span></button>
          </div>
        </div>
      </div>
    </div>
    <div class="row">
      <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
        <div class="x_panel">
          <div class="x_title">
            <h2>Catalogo de Artículos <small>Lista de posibles artículos en almacen.</small></h2>
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
                    <th>
                      <input type="checkbox" id="check-all" class="flat">
                    </th>
                    <th class="column-title">id </th>
                    <th class="column-title">Nombre </th>
                    <th class="column-title">Descripción </th>
                    <th class="column-title">Presentación</th>
                    <th class="column-title">Categoría</th>
                    <th class="column-title">Materia Prima</th>
                    <th class="column-title no-link last"><span class="nobr"></span>
                    </th>
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
                  <?php $articulos = almacen::getArticulos();
                  foreach ($articulos as $key => $value) { ?>
                    <tr class="even pointer">
                      <td class="a-center ">
                        <input type="checkbox" class="flat" name="table_records">
                      </td>
                      <td class=" "><?= $articulos[$key]['id_articulo'] ?></td>
                      <td class=" "><?= $articulos[$key]['nombre'] ?></td>
                      <td class=" "><?= $articulos[$key]['descripcion'] ?></td>
                      <td class=" "><?= $articulos[$key]['unidades'] ?><?= $articulos[$key]['escala'] ?>. <?= $articulos[$key]['tamaño'] ?></td>
                      <td class=" "><?= $articulos[$key]['Categoria'] ?></td>
                      <td class="text-center"><span class="fa fa-check"></span></td>
                      <td class=" last">
                        <div class="pull-right noMargin">
                          <a role="button"><span class="fa fa-trash s20"></span></a>
                          &nbsp;
                          <a role="button"><span class="fa fa-edit s20"></span></a>
                        </div>
                      </td>
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
              <label class="control-label col-lg-3 col-md-3 col-sm-3 col-xs-12" for="nombre_articulo">Nombre Artículo <span class="required">*</span>
              </label>
              <div class="col-lg-9 col-md-9 col-sm-9 col-xs-12">
                <input type="text" id="nombre_articulo" name="nombre_articulo" required="required" class="form-control col-md-7 col-xs-12">
              </div>
            </div>
            <div class="form-group">
              <label class="control-label col-lg-3 col-md-3 col-sm-3 col-xs-12" for="descripcion_articulo">Descripción <span class="required">*</span>
              </label>
              <div class="col-lg-9 col-md-9 col-sm-9 col-xs-12">
                <textarea id="descripcion_articulo" name="descripcion_articulo" required="required" class="form-control col-md-7 col-xs-12" rows="8" cols="40"></textarea>
              </div>
            </div>
            <div class="form-group">
              <label for="unidades_articulo" class="control-label col-lg-3 col-md-3 col-sm-3 col-xs-12">Unidades</label>
              <div class="col-lg-9 col-md-9 col-sm-9 col-xs-12">
                <input id="unidades_articulo" name="unidades_articulo" class="form-control col-md-7 col-xs-12" type="text">
              </div>
            </div>
            <div class="form-group">
              <label for="escala_articulo" class="control-label col-lg-3 col-md-3 col-sm-3 col-xs-12">Escala</label>
              <div class="col-lg-9 col-md-9 col-sm-9 col-xs-12">
                <input id="escala_articulo" name="escala_articulo" class="form-control col-md-7 col-xs-12" type="text">
              </div>
            </div>
            <div class="form-group">
              <label for="tamaño_articulo" class="control-label col-lg-3 col-md-3 col-sm-3 col-xs-12">Tamaño</label>
              <div class="col-lg-9 col-md-9 col-sm-9 col-xs-12">
                <input id="tamaño_articulo" name="tamaño_articulo" class="form-control col-md-7 col-xs-12" type="text">
              </div>
            </div>
            <div class="form-group">
              <label for="categoria_articulo" class="control-label col-lg-3 col-md-3 col-sm-3 col-xs-12">Categoria</label>
              <div class="col-lg-9 col-md-9 col-sm-9 col-xs-12">
                <select id="categoria_articulo" name="categoria_articulo" class="form-control col-md-7 col-xs-12">
                  <?php $categorias = almacen::getCategorias();
                  foreach ($categorias as $key => $value) { ?>
                    <option value="<?= $categorias[$key]['id_categorias'] ?>"><?= $categorias[$key]['nombre'] ?></option>
                  <?php } ?>
                </select>
              </div>
            </div>
            <div class="form-group">
              <label class="control-label col-lg-3 col-md-3 col-sm-3 col-xs-12">¿Materia Prima o conformada?</label>
              <div class="col-lg-9 col-md-9 col-sm-9 col-xs-12">
                <div id="tipo_articulo" class="btn-group" data-toggle="buttons">
                  <label>
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
