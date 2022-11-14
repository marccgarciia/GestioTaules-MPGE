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

        <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
        <script src="../js/grafico.js"></script>
        <!-- LINK FONT AWESOME -->
        <script src="https://kit.fontawesome.com/2b5286e1aa.js" crossorigin="anonymous"></script>
        <title>Página Principal - MPGE</title>
    </head>
<body>
    <div class="nav">
        <h1>Gestió Taules - MPGE</h1>
        <a class="cerrarsesion" href="login.html">Cerrar sesión</a>
        <hr class="separador">
    </div>
    
    <div class="mininav">
        <p class="bienvenida">Bienvenido @camarero1 - <span>ESTADÍSTICAS</span></p> 
        <a href="../view/principal.php" title="close" class="close"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512"><!--! Font Awesome Pro 6.2.0 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2022 Fonticons, Inc. --><path d="M0 416c0 35.3 28.7 64 64 64l320 0c35.3 0 64-28.7 64-64l0-320c0-35.3-28.7-64-64-64L64 32C28.7 32 0 60.7 0 96L0 416zM128 256c0-6.7 2.8-13 7.7-17.6l112-104c7-6.5 17.2-8.2 25.9-4.4s14.4 12.5 14.4 22l0 208c0 9.5-5.7 18.2-14.4 22s-18.9 2.1-25.9-4.4l-112-104c-4.9-4.5-7.7-10.9-7.7-17.6z"/></svg></a>
    </div>

    <div class="contenedor">

        <label for="btn-modal" class="btn-modal"><i class="fa-solid fa-magnifying-glass"></i></label> <!--buscador-->

        <input type="checkbox" id="btn-modal">
        
            <div class="filtros">
                <form action="estadisticas.php?filtro=filtro" method="POST">
                    <input type="text" name="filtro_camareros" placeholder="Filtrar Camareros">
                    <input type="text" name="filtro_salas" placeholder="Filtrar Salas">
                    <input type="text" name="filtro_mesas" placeholder="Filtrar Mesas">
                    <input type="date" name="filtro_dia" placeholder="Filtrar Dia">
                    <input type="time" name="filtro_horainicial" placeholder="Filtrar Hora Inicial">
                    <input type="time" name="filtro_horafinal" placeholder="Filtrar Hora Final">
                    <button type="submit" name="buscador" value="Buscar" class="btnbuscar"><label for=""><i class="fa-solid fa-bolt"></i></label></button> 
                </form> 
            </div>
        
        <div class="estadisticas">
                
            <table class="tftable">
                <tr>
                    <th>MESA</th>
                    <th>SALA</th>
                    <th>HORA OCUPACIÓN</th> 
                    <th>HORA LIBERACIÓN</th>
                    <th>DIA</th>
                    <th>OCUPACION</th>
                </tr>
            <?php


require_once '../controller/conexion.php';
require_once '../modal/reservamesa.php';
$mesas=ReservaMesa::getAll();
if(isset($_GET['filtro']) && isset($_POST['buscador'])){

    $camarero=$pdo->quote($_POST['filtro_camareros']);
    $salas=$pdo->quote($_POST['filtro_salas']);
    $mesas=$pdo->quote($_POST['filtro_mesas']);
    $dia=$pdo->quote($_POST['filtro_dia']);
    $horainicial=$pdo->quote($_POST['filtro_horainicial']);
    $horafinal=$pdo->quote($_POST['filtro_horafinal']);
/*     $camarero=$camarero[1];
    $mesas=$mesas[1]; */
    /* echo $camarero; */
    $mesas=ReservaMesa::getFilter($camarero,$salas,$mesas,$dia,$horainicial,$horafinal); 
    
}
$resultado = $mesas->fetchAll(PDO::FETCH_ASSOC);
$cantidadDeRegistros=count($resultado);
/* echo $cantidadDeRegistros; */
if($cantidadDeRegistros=='0'){
    echo "<p style=color:red;>No se encontro ningun registro</p>";
}else{
    echo "<p>Se han encontrado $cantidadDeRegistros registros</p>";
}
echo "<tr>";
foreach($resultado as $info){

    echo "<tr>";
    echo "<td>{$info['Id_mesa']}</td>";
    echo "<td>{$info['nombre_sala']}</td>";
    echo "<td>{$info['Hora_ini_rm']}</td>";
    echo "<td>{$info['Hora_final_rm']}</td>";
    echo "<td>{$info['Dia_rm']}</td>";
    echo "<td>{$info['Ocupacion_rm']}</td>";
    echo "</tr>";
}

            ?>
            </table>
        </div>

        <?php
        require_once "../modal/reservamesa.php";

        $lista=ReservaMesa::getMediasHora();
        $sala=[];
        $media=[];
        foreach ($lista as $resultado){
            $tiempo=explode(":",$resultado['mediaHoras']);
            $min=$tiempo[0]*60;
            $min2=$tiempo[1];
            $min3=$tiempo[2]/60;
            $minFin=$min + $min2 + $min3;

            array_push($sala, $resultado['nombre']);
            array_push($media,$minFin);
        }

        $salaJSON=json_encode($sala);
        $mediaJSON=json_encode($media);


        $ocupaciones=ReservaMesa::getOcupaciones();
        $sala2=[];
        $media2=[];
        foreach ($ocupaciones as $resultado){

            array_push($sala2, $resultado['nombre_sala']);
            array_push($media2,$resultado['suma']);
        }
        $ocupaciones=ReservaMesa::getEstatsCamareros();
        $sala3=[];
        $media3=[];
        foreach ($ocupaciones as $resultado){

            array_push($sala3, $resultado['cam']);
            array_push($media3,$resultado['media']);
        }
        $ocupaciones=ReservaMesa::getUsosMesas();
        $sala4=[];
        $media4=[];
        foreach ($ocupaciones as $resultado){

            array_push($sala4, $resultado['mesa']);
            array_push($media4,$resultado['dato']);
        }


        $salaJSON=json_encode($sala);
        $mediaJSON=json_encode($media);
        $sala2JSON=json_encode($sala2);
        $media2JSON=json_encode($media2);
        $sala3JSON=json_encode($sala3);
        $media3JSON=json_encode($media3);
        $sala4JSON=json_encode($sala4);
        $media4JSON=json_encode($media4);
        echo "<div class='buttons'>";
        echo "<button type='submit' name='js-open-modal' onclick="."graficoMediasHora($salaJSON,$mediaJSON)".">"."Tiempo de uso por salas"."</button>";
        echo "<button type='submit' name='js-open-modal' onclick="."graficoOcupacion($sala2JSON,$media2JSON)".">"."Ocupación diaria"."</button>";
        echo "<button type='submit' name='js-open-modal' onclick="."graficoCamareros($sala3JSON,$media3JSON)".">"."Servicios Camareros"."</button>";
        echo "<button type='submit' name='js-open-modal' onclick="."graficoMesas($sala4JSON,$media4JSON)".">"."Uso de mesas"."</button>";
        echo "</div>";


        ?>
        <div id="modal" class="modal">
            <div class="modalcontainer2">
                <canvas  id="myChart"></canvas>
                <a href="#" class="modalclose" id="js-close-modal">x</a>


            </div>
        </div>

    </div>


</body>
</html>