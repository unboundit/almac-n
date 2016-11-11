<?php
//invocacion de clases
use pdomysql AS pdomysql;
use user AS user;

class user{
	public static function register($user, $pass, $rol){
		//$consulta = 'call register_user("'.$mail.'", "'.$pass.'",  "'.$rol.'")';
    $consulta = 'INSERT INTO ALMACEN.USUARIOS (username, password, rol) VALUES ("'.$user.'", "'.$pass.'", "'.$rol.'")';
    error_log($consulta);
    $check = 'SELECT * FROM ALMACEN.USUARIOS where username="'.$user.'" and password = "'.$pass.'"';
    error_log($check);
    $PDOMYSQL = new PDOMYSQL;
    $insert = $PDOMYSQL->consulta($consulta);
    $result = $PDOMYSQL->consulta($check);
    if($result){
    	return $result;
    }
  }

  public static function login($user, $pass){
		$consulta = 'SELECT * FROM ALMACEN.USUARIOS where username="'.$user.'" and password = "'.$pass.'"';
		error_log($consulta);
    $PDOMYSQL = new PDOMYSQL;
    $result =  $PDOMYSQL->consulta($consulta);
   	return $result;
  }

  public static function artuculos(){
		$consulta = 'select a.nombre,a.descripcion,a.unidades,a.escala,a.tamaño, b.nombre as Categoria from almacen.articulos as a inner join almacen.categorias b on b.id_categorias = a.categorias_id_categorias';
		error_log($consulta);
    $PDOMYSQL = new PDOMYSQL;
    $result =  $PDOMYSQL->consulta($consulta);
   	return $result;
  }

  public static function categorias(){
		$consulta = 'select * from almacen.categorias';
		error_log($consulta);
    $PDOMYSQL = new PDOMYSQL;
    $result =  $PDOMYSQL->consulta($consulta);
   	return $result;
  }

    public static function paquete($descripcion, $id_Articulo, $cantidad){
		$consulta = 'INSERT INTO almacen.paquetes (descripcion) VALUES ('.$descripcion.')';
		error_log($consulta);

    	$PDOMYSQL = new PDOMYSQL;
    	$result =  $PDOMYSQL->consulta($consulta);
    	$id_Paquete = MaxPaquete();
		error_log($id_Paquete);
		$result2 = insertArticuloHasPaquete($id_Articulo, $id_Paquete, $cantidad);

		error_log($id_Paquete);

   	return $result;
  }
  private static function MaxPaquete(){
  	$consulta = 'select MAX(id_paquetes) from almacen.paquetes';
		error_log($consulta);
    $PDOMYSQL = new PDOMYSQL;
    $result =  $PDOMYSQL->consulta($consulta);

   	return $result;
  }
  private static function insertArticuloHasPaquete($id_articulo, $id_paquetes, $cantidad){
  	$consulta = 'INSERT INTO almacen.articulos_has_paquetes (articulos_id_articulo,paquetes_id_paquetes,cantidad) VALUES '.
  	 '('.$id_articulo.','.$id_paquetes,','.$cantidad .' )';

		error_log($consulta);

    	$PDOMYSQL = new PDOMYSQL;
    	$result =  $PDOMYSQL->consulta($consulta);
  }
  public static function existencias($id_articulo, $cantidad, $fecha)){
  	$consulta = 'INSERT INTO almacen.existencias (Cont, articulos_id_articulo, fecha) VALUES '.
  	 '('.$id_articulo.','.$id_articulo,,','.$fecha .' )';

		error_log($consulta);

    	$PDOMYSQL = new PDOMYSQL;
    	$result =  $PDOMYSQL->consulta($consulta);
  }

  public static function upArticulo($nombre, $descripcion, $unidades, $escala, $tamano, $articuloscol, $cat_id_cat){
	  $consulta = ' INSERT INTO almacen.articulos '.
		'(id_articulo, '.
		'nombre, '.
		'descripcion, '.
		'unidades, '.
		'escala, '.
		'tamaño, '.
		'articuloscol, '.
		'categorias_id_categorias) '.
	   'VALUES '.
		'('.$nombre.',
		  '.$descripcion.',
		  '.$unidades.',
		  '.$escala.',
		  '.$tamano.',
		  '.$articuloscol.',
		  '.$cat_id_cat.' )';
		error_log($consulta);
    $PDOMYSQL = new PDOMYSQL;
    $result =  $PDOMYSQL->consulta($consulta);
   	return $result;
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
