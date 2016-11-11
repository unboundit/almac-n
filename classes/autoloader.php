<?php
$mapping = array(
    'pdomysql' => __DIR__ . '/controller/pdomysql.php',
    'user' => __DIR__ . '/controller/user.php',
    'almacen' => __DIR__ . '/controller/almacen.php',
    //'soctable' => __DIR__ . '/controller/socTable.php',
    'ConnectionFactory' => __DIR__ . '/controller/ConnectionFactory.php',
);

spl_autoload_register(function ($class) use ($mapping) {
    if (isset($mapping[$class])) {
        require $mapping[$class];
    }
}, true);

?>
