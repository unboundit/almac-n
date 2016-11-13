<?php
require_once(__DIR__.'/classes/autoloader.php');
require_once(__DIR__.'/config.php');

if(!isset($_SESSION['user'])){
  header('Location: '.'index.php');
}
?>

<?php include __DIR__.'/header.php'; ?>

  <div id="existencias" class="right_col" role="main">
    <div class="row">
      <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12 pull-right noMargin">
        <div class="x_panel">
          <div class="x_title">
            <h2>Calendario <small>Mostrará la fecha actual</small></h2>
            <div class="clearfix"></div>
          </div>
          <div class="x_content">
            <div class="calendar z-block h200">
              <div class="z-content z-contentMiddle">
                <div class="calendar-table z-block centered">
                  <table class="table-condensed">
                    <thead>
                      <tr>
                        <th class="prev available"><i class="fa fa-chevron-left glyphicon glyphicon-chevron-left"></i></th>
                        <th colspan="5" class="month">Oct 2016</th>
                        <th class="next available"><i class="fa fa-chevron-right glyphicon glyphicon-chevron-right"></i></th>
                      </tr>
                      <tr>
                        <th>Su</th>
                        <th>Mo</th>
                        <th>Tu</th>
                        <th>We</th>
                        <th>Th</th>
                        <th>Fr</th>
                        <th>Sa</th>
                      </tr>
                    </thead>
                    <tbody>
                      <tr>
                        <td class="weekend off available" data-title="r0c0">25</td>
                        <td class="off available" data-title="r0c1">26</td>
                        <td class="off available" data-title="r0c2">27</td>
                        <td class="off available" data-title="r0c3">28</td>
                        <td class="off available" data-title="r0c4">29</td>
                        <td class="off available" data-title="r0c5">30</td>
                        <td class="weekend available" data-title="r0c6">1</td>
                      </tr>
                      <tr>
                        <td class="weekend available" data-title="r1c0">2</td>
                        <td class="available" data-title="r1c1">3</td>
                        <td class="available" data-title="r1c2">4</td>
                        <td class="available" data-title="r1c3">5</td>
                        <td class="available" data-title="r1c4">6</td>
                        <td class="available" data-title="r1c5">7</td>
                        <td class="weekend available" data-title="r1c6">8</td>
                      </tr>
                      <tr>
                        <td class="weekend available" data-title="r2c0">9</td>
                        <td class="available" data-title="r2c1">10</td>
                        <td class="available" data-title="r2c2">11</td>
                        <td class="available" data-title="r2c3">12</td>
                        <td class="available" data-title="r2c4">13</td>
                        <td class="available" data-title="r2c5">14</td>
                        <td class="weekend available" data-title="r2c6">15</td>
                      </tr>
                      <tr>
                        <td class="weekend available" data-title="r3c0">16</td>
                        <td class="available" data-title="r3c1">17</td>
                        <td class="today active start-date active end-date available" data-title="r3c2">18</td>
                        <td class="available" data-title="r3c3">19</td>
                        <td class="available" data-title="r3c4">20</td>
                        <td class="available" data-title="r3c5">21</td>
                        <td class="weekend available" data-title="r3c6">22</td>
                      </tr>
                      <tr>
                        <td class="weekend available" data-title="r4c0">23</td>
                        <td class="available" data-title="r4c1">24</td>
                        <td class="available" data-title="r4c2">25</td>
                        <td class="available" data-title="r4c3">26</td>
                        <td class="available" data-title="r4c4">27</td>
                        <td class="available" data-title="r4c5">28</td>
                        <td class="weekend available" data-title="r4c6">29</td>
                      </tr>
                      <tr>
                        <td class="weekend available" data-title="r5c0">30</td>
                        <td class="available" data-title="r5c1">31</td>
                        <td class="off available" data-title="r5c2">1</td>
                        <td class="off available" data-title="r5c3">2</td>
                        <td class="off available" data-title="r5c4">3</td>
                        <td class="off available" data-title="r5c5">4</td>
                        <td class="weekend off available" data-title="r5c6">5</td>
                      </tr>
                    </tbody>
                  </table>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
        <form class="x_panel">
          <div class="x_title">
            <h2>Artículos <!--<small>Lista de posibles artículos en almacen.</small>--></h2>
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
              <table id="availableArticles" class="table table-striped jambo_table">
                <thead>
                  <tr class="headings">
                    <th class="column-title">Artículo </th>
                    <th class="column-title">Descripción </th>
                    <th class="column-title">Cantidad Actual </th>
                    <th class="column-title last">Agregar </th>
                  </tr>
                </thead>
                <tbody>
                  <?php $articulos = almacen::getArticulos();
                  foreach ($articulos as $key => $value) { ?>
                    <tr class="even pointer">
                      <td class=" "><?= $articulos[$key]['nombre'] ?></td>
                      <td class=" "><?= $articulos[$key]['descripcion'] ?></td>
                      <td class=" ">$cantidad de ayer</td>
                      <td class=" last">
                        <div class="form-group">
                          <input type="number" id="cantidad_existencia_<?= $articulos[$key]['id_articulo'] ?>" name="cantidad_existencia_<?= $articulos[$key]['id_articulo'] ?>" required="required" class="cant form-control mw150">
                          <input class="id" type="hidden" id="idarticulo_existencia_<?= $articulos[$key]['id_articulo'] ?>" name="idarticulo_existencia_<?= $articulos[$key]['id_articulo'] ?>" value="<?= $articulos[$key]['id_articulo'] ?>">
                        </div>
                      </td>
                    </tr>
                  <?php } ?>
                </tbody>
              </table>
            </div>
          </div>
          <div class="x-footer text-right">
            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            <button type="button" id="saveExistencias" class="btn btn-primary">Save changes</button>
          </div>
        </form>
      </div>
      </div>
    </div>
  </div>

<?php include __DIR__.'/footer.php'; ?>
