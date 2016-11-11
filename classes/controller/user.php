<?php
//invocacion de clases
use pdomysql AS pdomysql;
use user AS user;

class user{
	public static function register($user, $pass, $rol){
		//$consulta = 'call register_user("'.$mail.'", "'.$pass.'",  "'.$rol.'")';
    $consulta = 'INSERT INTO almacen.usuarios (username, password, rol) VALUES ("'.$user.'", "'.$pass.'", "'.$rol.'")';
    $check = 	'SELECT * FROM ALMACEN.USUARIOS where username="'.$user.'" and password = "'.$pass.'"';
    error_log($consulta);
    $PDOMYSQL = new PDOMYSQL;
    $result =  $PDOMYSQL->consulta($consulta);
    $resultCheck = $PDOMYSQL->consulta($check);
    if($resultCheck){
    	return $resultCheck;
    }else{
    	return $resultCheck;
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
}
?>
