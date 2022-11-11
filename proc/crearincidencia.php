<?php

require_once '../modal/incidencias.php';
$mesa=$_GET['mesa'];

$descripcion=$_GET['descripcion'];

$mesas = Incidencias::getCreateIncidencia($mesa,$descripcion);