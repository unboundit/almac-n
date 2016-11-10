<?php

require_once('/autoloader.php');
require_once('../config.php');


//invocacion de clases
use pdomysql AS pdomysql;
use user AS user;


if (isset($_POST['login_user'])) {
	/*$_POST['pass'] = sha1($_POST['pass']);*/
	$result = user::login($_POST['txtusuario'], $_POST['txtpass']);
	if (!empty($result)) {
		$_SESSION['user'] = $result[0]['user'];
		error_log($_SESSION['user'] );
		$_SESSION['rol'] = $result[0]['rol'];
		error_log($_SESSION['rol']);
		echo json_encode($result);
	}else{
    $_SESSION['salva'] = "no hizo ni madre";
		echo 0;
	}
}



$usuario= $_POST["txtusuario"];
$pass= $_POST["txtpass"];


if(empty($usuario) || empty($pass)){
header("Location: index.html");
exit();
}

mysql_connect('localhost','root','') or die("Error al conectar " . mysql_error());
mysql_select_db('almacen') or die ("Error al seleccionar la Base de datos: " . mysql_error());

$result = mysql_query("SELECT * from usuarios where user='" . $usuario . "'");

if($row = mysql_fetch_array($result)){
if($row['pass'] == $pass){
session_start();
$_SESSION['usuario'] = $usuario;
header("Location: panel.html");
}else{
header("Location: index.html");
exit();
}
}else{
header("Location: index.html");
exit();
}


?>
