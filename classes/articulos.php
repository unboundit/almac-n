<?php
require_once('autoloader.php');
require_once('../config.php');

//invocacion de clases
use pdomysql AS pdomysql;
use almacen AS almacen;

if (isset($_POST['new_articulo'])) {
	$result = almacen::upArticulo($_POST['nombre_articulo'],$_POST['descripcion_articulo'],$_POST['unidades_articulo'],$_POST['escala_articulo'],$_POST['tamaño_articulo'],$_POST['categoria_articulo']);
	error_log(json_encode($result));
	if (!empty($result)) {
		echo json_encode($result);
	}else{
		echo 0;
	}
}

?>
