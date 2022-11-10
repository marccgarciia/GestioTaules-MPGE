<?php
require_once '../modal/incidencias.php';
$idincidencia=$_GET['id'];

$idmesa=$_GET['id_mesa'];

$mesas = Incidencias::getDeleteIncidencia($idincidencia,$idmesa);

