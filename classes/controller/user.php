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
}
?>
