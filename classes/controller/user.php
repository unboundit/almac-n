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
}
?>
