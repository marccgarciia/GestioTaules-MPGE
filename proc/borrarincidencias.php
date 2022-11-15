<?php
session_start();
if(!isset($_SESSION['oficio'])){
    echo "<script>window.location.href='login.html'</script>";
}

require_once '../modal/incidencias.php';
$idincidencia=$_GET['id'];

$idmesa=$_GET['id_mesa'];

$mesas = Incidencias::getDeleteIncidencia($idincidencia,$idmesa);

