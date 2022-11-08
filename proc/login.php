<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PHP action</title>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>
<body>
    
</body>
</html>
<?php

require_once '../controller/validate.php';
require_once '../controller/conexion.php';


$dni = $_POST['dni_gestor'];
$contraseña = $_POST['contra_gestor'];
$passwordHash = sha1($contraseña);

// $dni = $pdo->real_escape_string($dni);
$pdo->quote($dni);
$pdo->quote($passwordHash);
$sql = "SELECT * FROM tbl_camarero WHERE dni_cam = '$dni' and password_cam = '$passwordHash';";

// $stmt = mysqli_stmt_init($pdo);
$stmt= $pdo->prepare($sql);
$stmt-> bindParam(1,$dni);
$stmt-> bindParam(2,$passwordHash);
$stmt-> execute();
$cons_fin=$stmt -> fetchAll(PDO::FETCH_ASSOC);
$num = count($cons_fin);




// if (!mysqli_stmt_prepare($stmt, $sql)) {
//     header('Location:../controller/logval.php?error=errorconexion');
//     exit();
// }
if (registroCamposVacios($dni, $contraseña) !== FALSE) {
    header('Location:../controller/logval.php?error=camposvacios');
    exit();
}
// if (errorEmail($correo) !== FALSE) {
//     header('Location:logval.php?error=erroremail');
//     exit();
// }
// echo $num;   


if ($num == 1) {
    session_start();
    session_destroy();
    session_start();
    $_SESSION['dni'] = $dni;
    echo "<script>window.location.href = '../view/principal.php' </script>";
} else {
    echo "<script>Swal.fire({
        icon: 'error',
        title: 'Te has equivocado en el login',
        text: 'Introduce los datos de nuevo',
        showConfirmButton: false,
        timer: 2000
      })</script>";
    echo "<script>function vuelta(){
        window.location.href = '../index.html' 
        }
        setTimeout(vuelta,2000)</script>";
}
