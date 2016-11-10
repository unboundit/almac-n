<?php
//invocacion de clases
use pdomysql AS pdomysql;
use user AS user;

class user{
	public static function register($mail, $pass, $rol){
		$consulta = 'call register_user("'.$mail.'", "'.$pass.'",  "'.$rol.'")';
    error_log($consulta);
    $PDOMYSQL = new PDOMYSQL;
    $result =  $PDOMYSQL->consulta($consulta);
    if($result){
    	return $result;
    }else{
    	return $result;
    }
  }

  public static function login($user, $pass){
		$consulta = 'SELECT username, password, rol FROM ALMACEN.USUARIOS where username="'.$user.'" and password = "'.$pass.'"';
		error_log($consulta);
    $PDOMYSQL = new PDOMYSQL;
    $result =  $PDOMYSQL->consulta($consulta);
   	return $result;
  }
}
?>
