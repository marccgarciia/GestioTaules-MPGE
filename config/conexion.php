<?php

require_once 'config.php';

$conexion = mysqli_connect(BD['servidor'], BD['usuario'], BD['password'], BD['bd']);

if (!$conexion) {
    echo "<script>alert('Error conectando con la base de datos!')</script>";
    exit();
}