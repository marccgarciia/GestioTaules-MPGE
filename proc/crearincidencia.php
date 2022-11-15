<?php
session_start();
if(!isset($_SESSION['oficio'])){
    echo "<script>window.location.href='login.html'</script>";
}
require_once '../modal/incidencias.php';
$mesa=$_GET['mesa'];

$descripcion=$_GET['descripcion'];

$mesas = Incidencias::getCreateIncidencia($mesa,$descripcion);