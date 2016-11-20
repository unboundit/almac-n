<?php
//invocacion de clases
use pdomysql AS pdomysql;
use almacen AS almacen;


class almacen{
  public static function getArticulos(){
    $consulta = "SELECT a.id_articulo,a.nombre,a.descripcion,a.tamano, b.nombre as Categoria, c.nomEscala as Escala 
    from articulos as a 
    inner join categorias b on b.id_categorias = a.categorias_id_categorias
    inner join escalas c on c.idescalas = a.escalas_idescalas WHERE a.id_articulo ORDER BY a.id_articulo ASC";
    error_log($consulta);
    $PDOMYSQL = new PDOMYSQL;
    $result =  $PDOMYSQL->consulta($consulta);
    return $result;
  }

  public static function getSumArticulos(){
    $consulta = 'SELECT B.id_categorias, SUM(A.unidades) AS suma, B.nombre from articulos AS A INNER JOIN categorias B on A.categorias_id_categorias = B.id_categorias
    where B.id_categorias group BY  B.id_categorias ASC';
    error_log($consulta);
    $PDOMYSQL = new PDOMYSQL;
    $result =  $PDOMYSQL->consulta($consulta);
    return $result;

  }

  public static function getSumTotPaquetes(){
    $consulta = 'SELECT count(A.id_paquetes) as ids, C.nombre, sum(B.cantidad) as suma FROM paquetes as A
    INNER JOIN articulos_has_paquetes B on A.id_paquetes = B.paquetes_id_paquetes
    INNER JOIN articulos C on B.articulos_id_articulo = C.id_articulo
    where C.id_articulo  group By C.id_articulo  ASC';
    error_log($consulta);
    $PDOMYSQL = new PDOMYSQL;
    $result =  $PDOMYSQL->consulta($consulta);
    return $result;
  }

  public static function getCategorias(){
    $consulta = 'SELECT * from categorias';
    error_log($consulta);
    $PDOMYSQL = new PDOMYSQL;
    $result =  $PDOMYSQL->consulta($consulta);
    return $result;
  }
    public static function getEscalas(){
    $consulta = 'SELECT * from escalas';
    error_log($consulta);
    $PDOMYSQL = new PDOMYSQL;
    $result =  $PDOMYSQL->consulta($consulta);
    return $result;
  }

  public static function getPaquetes(){
    $consulta = 'SELECT A.id_paquetes, A.descripcion, C.nombre, B.cantidad FROM paquetes as A INNER JOIN articulos_has_paquetes B on A.id_paquetes = B.paquetes_id_paquetes
    inner JOIN articulos C on B.articulos_id_articulo = C.id_articulo
    WHERE A.id_paquetes ORDER BY A.id_paquetes ASC';

    error_log($consulta);
    $PDOMYSQL = new PDOMYSQL;
    $result =  $PDOMYSQL->consulta($consulta);
    return $result;

  }

  public static function upSucursal($nomSucursal){
    $consulta = 'INSERT INTO sucursal (NomSucursal) VALUES ('.$nomSucursal.');';

    error_log($consulta);
    $PDOMYSQL = new PDOMYSQL;
    $result =  $PDOMYSQL->consulta($consulta);
    return $result;
  }

  public static function upSalidaAlmacen($id_paquete, $id_sucursal){
    $consulta = 'INSERT INTO salidaalmacen (fecha) VALUES (CURDATE())';
    error_log($consulta);
    $PDOMYSQL = new PDOMYSQL;
    $result =  $PDOMYSQL->consulta($consulta);
    $idSalidaAlmacen = MaxSalidaAlmacen();

    $result = paquetes_has_SalidaAlmacen($id_paquete, $idSalidaAlmacen, $id_sucursal);
    return $result;
  }

  public static function paquete($descripcion, $id_Articulo, $cantidad){
    $consulta = 'INSERT INTO paquetes (descripcion) VALUES ("'.$descripcion.'")';
    //error_log(print_r($consulta, true));
    $check = 'SELECT id_paquetes FROM paquetes WHERE descripcion = "'.$descripcion.'"';
    //error_log($consulta);
    $PDOMYSQL = new PDOMYSQL;
    $insert = $PDOMYSQL->consulta($consulta);
    $result = $PDOMYSQL->consulta($check);
    $id_paquete = $result[0]['id_paquetes'];
    //error_log(print_r($id_paquete, true));
    if($id_paquete){
      $result2 = almacen::insertArticuloHasPaquete($id_Articulo, $id_paquete, $cantidad);
      return $result2;
    } else {
      return 0;
    }
  }

  public static function insertArticuloHasPaquete($id_articulo, $id_paquete, $cantidad){
    $consulta = 'INSERT INTO articulos_has_paquetes (articulos_id_articulo, paquetes_id_paquetes, cantidad) VALUES ("'.$id_articulo.'","'.$id_paquete.'","'.$cantidad .'" )';
    //error_log(print_r($consulta, true));
    $check = 'SELECT * FROM articulos_has_paquetes WHERE articulos_id_articulo = "'.$id_articulo.'" and paquetes_id_paquetes = "'.$id_paquete.'" and cantidad ="'.$cantidad.'"';
    //error_log(print_r($check, true));
    $PDOMYSQL = new PDOMYSQL;
    $insert = $PDOMYSQL->consulta($consulta);
    $result = $PDOMYSQL->consulta($check);
    //error_log(print_r($result, true));
    if($result){
      return $result;
    }
  }

  public static function existencias($id_articulo, $cantidad, $fecha){
    $consulta = 'INSERT INTO existencias (Cont, articulos_id_articulo, fecha) VALUES ("'.$id_articulo.'","'.$id_articulo.'","'.$fecha.'" )';
    $check = 'SELECT * FROM existencias WHERE articulos_id_articulo = "'.$id_articulo.'"';
    error_log($consulta);

    $PDOMYSQL = new PDOMYSQL;
    $result =  $PDOMYSQL->consulta($consulta);
  }

  public static function upArticulo($nombre, $descripcion, $tamano, $cat_id_cat, $esc_idescala){
    $consulta = "INSERT INTO articulos (nombre, descripcion, tamano, categorias_id_categorias, escalas_idescalas) VALUES (?,?,?,?,?)";
    $parametros = array($nombre, $descripcion,$tamano, $cat_id_cat,$esc_idescala);


    $check = "SELECT * FROM articulos WHERE nombre = ? and descripcion = ? and tamano = ? and categorias_id_categorias =? and escalas_idescalas =?";

    error_log($check);
    $PDOMYSQL = new PDOMYSQL;
    $insert = $PDOMYSQL->consultaSegura($consulta, $parametros);
    $result = $PDOMYSQL->consultaSegura($check, $parametros);
    if($result){
      return $result;
    }
  }

  public static function upArticuloSegura($nombre, $descripcion, $unidades, $escala, $tamano, $articuloscol, $cat_id_cat){
    $areglo=array(
      1=>$nombre,
      2=>$descripcion,
      3=>$unidades,
      4=>$escala,
      5=>$tamano,
      6=>$articuloscol,
      7=>$cat_id_cat
    );
    $consulta = ' INSERT INTO articulos '.
    '(nombre, '.
    'descripcion, '.
    'unidades, '.
    'escala, '.
    'tamaño, '.
    'articuloscol, '.
    'categorias_id_categorias) '.
    'VALUES '.
    '(?,?,?,?,?,?,?		)';
    error_log($consulta);
    $PDOMYSQL = new PDOMYSQL;
    $result =  $PDOMYSQL->consultaSegura($consulta,$areglo);
    return $result;
  }

  //FUnciones Privadas
  private static function MaxPaquete(){
    $consulta = 'select MAX(id_paquetes) from paquetes';
    error_log($consulta);
    $PDOMYSQL = new PDOMYSQL;
    $result =  $PDOMYSQL->consulta($consulta);

    return $result;
  }

  private static function MaxSalidaAlmacen(){
    $consulta = 'select MAX(idSalidaAlmacen) from salidaalmacen';
    error_log($consulta);
    $PDOMYSQL = new PDOMYSQL;
    $result =  $PDOMYSQL->consulta($consulta);

    return $result;
  }

  private static function paquetes_has_SalidaAlmacen($id_paquete, $idSalidaAlmacen, $id_sucursal){
    $consulta = 'INSERT INTO paquetes_has_salidaalmacen (paquetes_id_paquetes, SalidaAlmacen_idSalidaAlmacen, Sucursal_idSucursal) VALUES ("'.$id_paquete.'","'.$idSalidaAlmacen.'","'.$id_sucursal .'" )';
    error_log($consulta);
    $PDOMYSQL = new PDOMYSQL;
    $result =  $PDOMYSQL->consulta($consulta);
  }

  public static function chearExistencas($id_PaquetesArray){
    $query ='';

    for ($i=0; $i < count($id_PaquetesArray); $i++) { 
      # code...   
    }
  }



}
?>
