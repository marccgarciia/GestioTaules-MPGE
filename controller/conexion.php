<?php
Require_Once "config.php";
$servidor= "mysql:host=".SERVER.";dbname=".BD;
try {
    $pdo = new PDO($servidor, USER, PWD, array(PDO::MYSQL_ATTR_INIT_COMMAND=>"SET NAMES UTF8"));

}catch (Exception $e) {
    echo $e->getMessage();
    /* alert('Error en la conexión con la base de datos'); */
}
