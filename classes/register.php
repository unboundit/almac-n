<?php
require_once('autoloader.php');
require_once('../config.php');


//invocacion de clases
use pdomysql AS pdomysql;
use user AS user;


if (isset($_POST['register_user'])) {
	/*$_POST['pass'] = sha1($_POST['pass']);*/
	$result = user::register($_POST['username'], $_POST['pass'], $_['rol']);
	//error_log($result);
	if (!empty($result)) {
		echo json_encode($result);
	}else{
		echo 0;
	}
} else {
  echo 0;
}

?>
