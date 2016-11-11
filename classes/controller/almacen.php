<?php
//invocacion de clases
use pdomysql AS pdomysql;
use almacen AS almacen;

class almacen{
  public static function getArticulos(){
		$consulta = 'select a.id_articulo,a.nombre,a.descripcion,a.unidades,a.escala,a.tamaño, b.nombre as Categoria from almacen.articulos as a inner join almacen.categorias b on b.id_categorias = a.categorias_id_categorias';
		error_log($consulta);
    $PDOMYSQL = new PDOMYSQL;
    $result =  $PDOMYSQL->consulta($consulta);
   	return $result;
  }

  public static function getCategorias(){
		$consulta = 'select * from almacen.categorias';
		error_log($consulta);
    $PDOMYSQL = new PDOMYSQL;
    $result =  $PDOMYSQL->consulta($consulta);
   	return $result;
  }
  public static function upSalidaAlmacen($id_paquete, $id_sucursal){
    $consulta = 'INSERT INTO almacen.salidaalmacen (fecha) VALUES (CURDATE())';
    error_log($consulta);
    $PDOMYSQL = new PDOMYSQL;
    $result =  $PDOMYSQL->consulta($consulta);
    $idSalidaAlmacen = MaxSalidaAlmacen();

    $result = paquetes_has_SalidaAlmacen($id_paquete, $idSalidaAlmacen, $id_sucursal);
    return $result;

  }
private static function MaxSalidaAlmacen(){
    $consulta = 'select MAX(idSalidaAlmacen) from almacen.salidaalmacen';
    error_log($consulta);
    $PDOMYSQL = new PDOMYSQL;
    $result =  $PDOMYSQL->consulta($consulta);

    return $result;
  }
private static function paquetes_has_SalidaAlmacen($id_paquete, $idSalidaAlmacen, $id_sucursal){
  $consulta = 'INSERT INTO almacen.paquetes_has_salidaalmacen (paquetes_id_paquetes, SalidaAlmacen_idSalidaAlmacen, Sucursal_idSucursal) VALUES ("'.$id_paquete.'","'.$idSalidaAlmacen.'","'.$id_sucursal .'" )';

    error_log($consulta);

      $PDOMYSQL = new PDOMYSQL;
      $result =  $PDOMYSQL->consulta($consulta);

}

  public static function paquete($descripcion, $id_Articulo, $cantidad){

		$consulta = 'INSERT INTO almacen.paquetes (descripcion) VALUES ("'.$descripcion.'")';
		//error_log(print_r($consulta, true));
    $check = 'SELECT id_paquetes FROM almacen.paquetes WHERE descripcion = "'.$descripcion.'"';
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

  private static function MaxPaquete(){
  	$consulta = 'select MAX(id_paquetes) from almacen.paquetes';
		error_log($consulta);
    $PDOMYSQL = new PDOMYSQL;
    $result =  $PDOMYSQL->consulta($consulta);

   	return $result;
  }


  public static function insertArticuloHasPaquete($id_articulo, $id_paquete, $cantidad){
  	$consulta = 'INSERT INTO almacen.articulos_has_paquetes (articulos_id_articulo, paquetes_id_paquetes, cantidad) VALUES ("'.$id_articulo.'","'.$id_paquete.'","'.$cantidad .'" )';
    //error_log(print_r($consulta, true));
    $check = 'SELECT * FROM almacen.articulos_has_paquetes WHERE articulos_id_articulo = "'.$id_articulo.'" and paquetes_id_paquetes = "'.$id_paquete.'" and cantidad ="'.$cantidad.'"';
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
  	$consulta = 'INSERT INTO almacen.existencias (Cont, articulos_id_articulo, fecha) VALUES ("'.$id_articulo.'","'.$id_articulo.'","'.$fecha.'" )';
    $check = 'SELECT * FROM almace.existencias WHERE articulos_id_articulo = "'.$id_articulo.'"';
		error_log($consulta);

    	$PDOMYSQL = new PDOMYSQL;
    	$result =  $PDOMYSQL->consulta($consulta);
  }

  public static function upArticulo($nombre, $descripcion, $unidades, $escala, $tamano, $cat_id_cat){
	  $consulta = 'INSERT INTO almacen.articulos (nombre, descripcion, unidades, escala, tamaño, categorias_id_categorias)
    VALUES ("'.$nombre.'","'.$descripcion.'","'.$unidades.'","'.$escala.'","'.$tamano.'","'.$cat_id_cat.'")';
		error_log($consulta);
    $check = 'SELECT * FROM almacen.articulos WHERE
      nombre = "'.$nombre.'" and descripcion = "'.$descripcion.'" and escala = "'.$escala.'" and tamaño = "'.$tamano.'" and categorias_id_categorias ="'.$cat_id_cat.'"';
    error_log($check);
    $PDOMYSQL = new PDOMYSQL;
    $insert = $PDOMYSQL->consulta($consulta);
    $result = $PDOMYSQL->consulta($check);
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
	  $consulta = ' INSERT INTO almacen.articulos '.
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
}
?>
