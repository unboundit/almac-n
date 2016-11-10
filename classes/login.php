<?php

require_once('/autoloader.php');
require_once('../config.php');


//invocacion de clases
use pdomysql AS pdomysql;
use user AS user;


if (isset($_POST['login_user'])) {
	/*$_POST['pass'] = sha1($_POST['pass']);*/
	$result = user::login($_POST['txtusuario'], $_POST['txtpass']);
	error_log($result);
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

?>
