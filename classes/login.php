<?php
require_once('autoloader.php');
require_once('../config.php');

//invocacion de clases
use pdomysql AS pdomysql;
use user AS user;

if (isset($_POST['login_user'])) {
	/*$_POST['pass'] = sha1($_POST['pass']);*/
	$result = user::login($_POST['txtusuario'], $_POST['txtpass']);
	//error_log($result);
	if (!empty($result)) {
		$_SESSION['user'] = $result[0]['username'];
		//error_log($_SESSION['user'] );
		$_SESSION['rol'] = $result[0]['rol'];
		//error_log($_SESSION['rol']);
		echo json_encode($result);
	}else{
		echo 0;
	}
}
if (isset($_POST['logout'])) {
	/*$_POST['pass'] = sha1($_POST['pass']);*/
	$result = user::logout();
	//error_log($result);
	if (!empty($result)) {

		echo json_encode($result);
	}else{
		echo 0;
	}
}

?>
