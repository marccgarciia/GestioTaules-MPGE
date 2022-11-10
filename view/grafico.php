
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script src="../js/graficos.js"></script>
    <script src="../static/css/grafic.css"></script>
</head>
<body>



<?php
require_once "../modal/reservamesa.php";

    $lista=ReservaMesa::getMediasHora(1);
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

  echo "<button onclick="."graficoMediasHora($salaJSON,$mediaJSON)".">"."Tiempo de uso por salas"."</button>";


?>
<div id="modal" class="modal">

    <div class="modalcontainer">
        <canvas  id="myChart"></canvas>
        <a href="#" class="modalclose" id="js-close-modal">x</a>
    </div>
</div>

</body>
</html>
