<?php
session_start();
if(!isset($_SESSION['oficio'])){
    echo "<script>window.location.href='login.html'</script>";
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- LINK BOOTSTRAP -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <!-- LINK CSS -->
    <link rel="stylesheet" href="../static/css/styles.css">
    <!-- LINK JS -->
    <script type="text/javascript" src="../static/js/script.js"></script>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <!-- LINK FONT AWESOME -->
    <script src="https://kit.fontawesome.com/2b5286e1aa.js" crossorigin="anonymous"></script>
    <title>Página Principal - MPGE</title>
</head>

<body>
    <div class="nav">
        <h1>Gestió Taules - MPGE</h1>
        <a class="cerrarsesion" href="../proc/cerrarsesion.php">Cerrar sesión</a>
        <hr class="separador">
    </div>
<?php
    
    $nombre=$_SESSION['nombre'];
    echo "<p class='bienvenida'>Bienvenido $nombre</p>";
?>
    

    <div class="menu">

        <?php
        require_once "../modal/sala.php";
        /* session_start(); */

        $ListaSalas = Sala::getAll();
        foreach ($ListaSalas as $salas => $sala) {

            echo "<a href='mostrarmesas.php?sala={$sala['Id_sala']}'>{$sala['nombre_sala']}</a>";
        }
        ?>
        <a href="estadisticas.php">ESTADÍSTICAS</a>
        <?php
            if($_SESSION['oficio']=='mantenimiento'){
                echo "<a href='incidencia.php'>INCIDENCIAS</a>";
            }
            /* else{
                echo "<a href='crearincidencia.php'>CREAR INCIDENCIA</a>";
            } */
        ?>
        <!-- <a href="incidencia.php">INCIDENCIAS</a> -->
    </div>
</body>

</html>