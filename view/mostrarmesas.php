<?php
session_start();
if(!isset($_SESSION['oficio'])){
    echo "<script>window.location.href='login.html'</script>";
}
if(!isset($_REQUEST['sala'])){
    echo "<script>window.location.href='principal.php'</script>";
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
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <!--    <script src="../js/reload.js"></script>-->
    <script src="../js/script.js"></script>
    <!-- <script type="text/javascript" src="../static/js/script.js"></script> -->
    <!--  <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script> -->
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

    <div class="mininav">
    <?php
    
    $nombre=$_SESSION['nombre'];


                require_once "../modal/sala.php";
                

                $ListaSalas = Sala::nameById($_GET['sala']);
                foreach ($ListaSalas as $salas => $sala) {
                    echo "<p class='bienvenida'>Bienvenido $nombre <span>$sala</span></p>";
                    /* echo $sala; */
                }
                ?>
            </span></p>

        <!-- BOTON MANTENIMIENTO -->
        <?php
        if($_SESSION['oficio'] == 'mantenimiento'){
        ?>
        <a href="incidencia.php" title="incidencia" class="incidencia" name="js-open-modal"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512">
                <!--! Font Awesome Pro 6.2.0 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2022 Fonticons, Inc. -->
                <path d="M495.9 166.6c3.2 8.7 .5 18.4-6.4 24.6l-43.3 39.4c1.1 8.3 1.7 16.8 1.7 25.4s-.6 17.1-1.7 25.4l43.3 39.4c6.9 6.2 9.6 15.9 6.4 24.6c-4.4 11.9-9.7 23.3-15.8 34.3l-4.7 8.1c-6.6 11-14 21.4-22.1 31.2c-5.9 7.2-15.7 9.6-24.5 6.8l-55.7-17.7c-13.4 10.3-28.2 18.9-44 25.4l-12.5 57.1c-2 9.1-9 16.3-18.2 17.8c-13.8 2.3-28 3.5-42.5 3.5s-28.7-1.2-42.5-3.5c-9.2-1.5-16.2-8.7-18.2-17.8l-12.5-57.1c-15.8-6.5-30.6-15.1-44-25.4L83.1 425.9c-8.8 2.8-18.6 .3-24.5-6.8c-8.1-9.8-15.5-20.2-22.1-31.2l-4.7-8.1c-6.1-11-11.4-22.4-15.8-34.3c-3.2-8.7-.5-18.4 6.4-24.6l43.3-39.4C64.6 273.1 64 264.6 64 256s.6-17.1 1.7-25.4L22.4 191.2c-6.9-6.2-9.6-15.9-6.4-24.6c4.4-11.9 9.7-23.3 15.8-34.3l4.7-8.1c6.6-11 14-21.4 22.1-31.2c5.9-7.2 15.7-9.6 24.5-6.8l55.7 17.7c13.4-10.3 28.2-18.9 44-25.4l12.5-57.1c2-9.1 9-16.3 18.2-17.8C227.3 1.2 241.5 0 256 0s28.7 1.2 42.5 3.5c9.2 1.5 16.2 8.7 18.2 17.8l12.5 57.1c15.8 6.5 30.6 15.1 44 25.4l55.7-17.7c8.8-2.8 18.6-.3 24.5 6.8c8.1 9.8 15.5 20.2 22.1 31.2l4.7 8.1c6.1 11 11.4 22.4 15.8 34.3zM256 336c44.2 0 80-35.8 80-80s-35.8-80-80-80s-80 35.8-80 80s35.8 80 80 80z" />
            </svg></a>
        <?php
        }else{
            
        ?>
        <a onclick="modalIncidencia();" style="cursor: pointer;" id="js2-open-modal" title="incidencia" class="incidencia" ><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512">
                <!--! Font Awesome Pro 6.2.0 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2022 Fonticons, Inc. -->
                <path d="M495.9 166.6c3.2 8.7 .5 18.4-6.4 24.6l-43.3 39.4c1.1 8.3 1.7 16.8 1.7 25.4s-.6 17.1-1.7 25.4l43.3 39.4c6.9 6.2 9.6 15.9 6.4 24.6c-4.4 11.9-9.7 23.3-15.8 34.3l-4.7 8.1c-6.6 11-14 21.4-22.1 31.2c-5.9 7.2-15.7 9.6-24.5 6.8l-55.7-17.7c-13.4 10.3-28.2 18.9-44 25.4l-12.5 57.1c-2 9.1-9 16.3-18.2 17.8c-13.8 2.3-28 3.5-42.5 3.5s-28.7-1.2-42.5-3.5c-9.2-1.5-16.2-8.7-18.2-17.8l-12.5-57.1c-15.8-6.5-30.6-15.1-44-25.4L83.1 425.9c-8.8 2.8-18.6 .3-24.5-6.8c-8.1-9.8-15.5-20.2-22.1-31.2l-4.7-8.1c-6.1-11-11.4-22.4-15.8-34.3c-3.2-8.7-.5-18.4 6.4-24.6l43.3-39.4C64.6 273.1 64 264.6 64 256s.6-17.1 1.7-25.4L22.4 191.2c-6.9-6.2-9.6-15.9-6.4-24.6c4.4-11.9 9.7-23.3 15.8-34.3l4.7-8.1c6.6-11 14-21.4 22.1-31.2c5.9-7.2 15.7-9.6 24.5-6.8l55.7 17.7c13.4-10.3 28.2-18.9 44-25.4l12.5-57.1c2-9.1 9-16.3 18.2-17.8C227.3 1.2 241.5 0 256 0s28.7 1.2 42.5 3.5c9.2 1.5 16.2 8.7 18.2 17.8l12.5 57.1c15.8 6.5 30.6 15.1 44 25.4l55.7-17.7c8.8-2.8 18.6-.3 24.5 6.8c8.1 9.8 15.5 20.2 22.1 31.2l4.7 8.1c6.1 11 11.4 22.4 15.8 34.3zM256 336c44.2 0 80-35.8 80-80s-35.8-80-80-80s-80 35.8-80 80s35.8 80 80 80z" />
            </svg></a>
        <?php
        }
        ?>
        <a href="../view/principal.php" title="close" class="close"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512">
                <!--! Font Awesome Pro 6.2.0 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2022 Fonticons, Inc. -->
                <path d="M0 416c0 35.3 28.7 64 64 64l320 0c35.3 0 64-28.7 64-64l0-320c0-35.3-28.7-64-64-64L64 32C28.7 32 0 60.7 0 96L0 416zM128 256c0-6.7 2.8-13 7.7-17.6l112-104c7-6.5 17.2-8.2 25.9-4.4s14.4 12.5 14.4 22l0 208c0 9.5-5.7 18.2-14.4 22s-18.9 2.1-25.9-4.4l-112-104c-4.9-4.5-7.7-10.9-7.7-17.6z" />
            </svg></a>
    </div>
    <?php
    require_once '../controller/conexion.php';
    require_once '../modal/mesa.php';
    if (isset($_GET['camb']) && $_GET['camb'] == 'si') {

        Mesa::updateEstado($_GET['sala'],$_GET['id'], $_GET['est'], (int)$_GET['comen'],$_SESSION['camarero']);
    }

    $mesas = Mesa::getAllBySalaId($_GET['sala']);

    $resultado = $mesas->fetchAll(PDO::FETCH_ASSOC);
    /* var_dump($resultado); */
    ?>
    <div class="contenedor ">
        <?php
        $libre = 'libre';
        foreach ($resultado as $mesa) {
            echo "<div class='mesas'>";
/*             echo "<div class='column20altura'>";
            echo "<p>MESA: $mesa[Id_mesa]</p>";
            echo "</div>"; */
            
            echo "<div>";
            if($_SESSION['oficio'] == 'camarero'){
                if ($mesa['capacidad_mesa'] == '4' && $mesa['Estado'] == 'libre') {
                    /* echo "<div class='mesas'>"; */
                    echo "<img name='js-open-modal' style=cursor:pointer; src='../static/img/4disponible.png'" . "onClick=" . "clickMe2({$mesa['Id_mesa']},'ocupada',{$_GET['sala']})" . ">";
                    /* echo "</div>"; */
                }
                if ($mesa['capacidad_mesa'] == '4' && $mesa['Estado'] == 'ocupada') {
                    /* echo "<div class='mesas'>"; */
                    echo "<img style=cursor:pointer; src='../static/img/4ocupado.png'" . "onClick=" . "clickMe({$mesa['Id_mesa']},'libre',{$_GET['sala']})" . ">";
                    /* echo "</div>"; */
                }
                if ($mesa['capacidad_mesa'] == '4' && $mesa['Estado'] == 'mantenimiento') {
                    /* echo "<div class='mesas'>"; */
                    echo "<img style=cursor:pointer; src='../static/img/4mantenimiento.png' alt='ocupado'>";
                    /* echo "</div>"; */
                }
                if ($mesa['capacidad_mesa'] == '2' && $mesa['Estado'] == 'libre') {
                    echo "<img style=cursor:pointer;  name='js-open-modal' src='../static/img/2disponible.png'" . "onClick=" . "clickMe2({$mesa['Id_mesa']},'ocupada',{$_GET['sala']})" . ">";
                }
                if ($mesa['capacidad_mesa'] == '2' && $mesa['Estado'] == 'ocupada') {
                    /* echo "<div class='mesas'>"; */
                    echo "<img style=cursor:pointer; src='../static/img/2ocupado.png'" . "onClick=" . "clickMe({$mesa['Id_mesa']},'libre',{$_GET['sala']})" . ">";
                    /* echo "</div>"; */
                }
                if ($mesa['capacidad_mesa'] == '2' && $mesa['Estado'] == 'mantenimiento') {
                    /* echo "<div class='mesas'>"; */
                    echo "<img style=cursor:pointer; src='../static/img/2mantenimiento.png' alt='ocupado'>";
                    /* echo "</div>"; */
                }
            }else{

            
            if ($mesa['capacidad_mesa'] == '4' && $mesa['Estado'] == 'libre') {
                /* echo "<div class='mesas'>"; */
                echo "<img name='js-open-modal' style=cursor:pointer; src='../static/img/4disponible.png' >";
                /* echo "</div>"; */
            }
            if ($mesa['capacidad_mesa'] == '4' && $mesa['Estado'] == 'ocupada') {
                /* echo "<div class='mesas'>"; */
                echo "<img style=cursor:pointer; src='../static/img/4ocupado.png'>";
                /* echo "</div>"; */
            }
            if ($mesa['capacidad_mesa'] == '4' && $mesa['Estado'] == 'mantenimiento') {
                /* echo "<div class='mesas'>"; */
                echo "<img style=cursor:pointer; src='../static/img/4mantenimiento.png' alt='ocupado'>";
                /* echo "</div>"; */
            }
            if ($mesa['capacidad_mesa'] == '2' && $mesa['Estado'] == 'libre') {
                echo "<img style=cursor:pointer;  name='js-open-modal' src='../static/img/2disponible.png'>";
            }
            if ($mesa['capacidad_mesa'] == '2' && $mesa['Estado'] == 'ocupada') {
                /* echo "<div class='mesas'>"; */
                echo "<img style=cursor:pointer; src='../static/img/2ocupado.png'>";
                /* echo "</div>"; */
            }
            if ($mesa['capacidad_mesa'] == '2' && $mesa['Estado'] == 'mantenimiento') {
                /* echo "<div class='mesas'>"; */
                echo "<img style=cursor:pointer; src='../static/img/2mantenimiento.png' alt='ocupado'>";
                /* echo "</div>"; */
            }
        }
            
            echo "<p class='flex'>MESA: $mesa[Id_mesa]</p>";
            
            echo "</div>";
            echo "</div>";
        }
        ?>

        <div id="modal" class="modal">
            <div class="modalcontainer">
                <form id="form" method="post">
                    <input type="number" id="comensales" name="comensales" value="1">
                    <input type="submit" id="submit" value="OK">
                    <a href="#" class="modalclose" id="js-close-modal">X</a>
                </form>
            </div>
        </div>
        <!-- MODAL MANTENIMIENTO -->
        <div id="js2-open-modal" class="modal2" >
            <div class="modalcontainer">
                <form id="form2" method="post">
                    <!-- <input type="number" id="nummesa" name="nummesa" value="" placeholder="Número de Mesa"> -->
                    
                    <select style="width: 83%; height:30px; border-radius:5px;"name="nummesa" id="nummesa" placeholder="Número de Mesa">
                        <?php
                            foreach($resultado as $info){
                                echo "<option value='{$info['Id_mesa']}'>MESA: {$info['Id_mesa']}</option>";
                                
                            }
                        ?>
                    </select>
                    <br>
                    <input type="text" size="15" maxlength="100" id="desc" name="desc" placeholder="Incidencia">
                    <input type="submit" id="submit" value="OK">
                    <a href="#" class="modalclose" id="close-modal">X</a>
                </form>
            </div>
        </div>
    </div>
</body>

</html>