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
                    <button type="submit" name="buscador" value="Buscar" class="btnbuscar"><label for=""><i class="fa-solid fa-bolt"></i></label></button> 
                </form> 
            </div>
        
        <div class="estadisticas">
                
            <table class="tftable">
                <tr>
                    <th>MESA</th>
                    <th>SALA</th>
                    <th>ESTADO</th> 
                    <th>HORA</th>
                    <th>DIA</th>
                    <th>OCUPACION</th>
                </tr>
            <?php


require_once '../controller/conexion.php';
require_once '../modal/reservamesa.php';
$mesas=ReservaMesa::getAll();
if(isset($_GET['filtro']) && isset($_POST['buscador'])){
    $mesas=ReservaMesa::getFilter($_POST['filtro_camareros'],$_POST['filtro_salas'],$_POST['filtro_mesas']);
    
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
    echo "<td>{$info['estado']}</td>";
    echo "<td>{$info['Hora_rm']}</td>";
    echo "<td>{$info['Dia_rm']}</td>";
    echo "<td>{$info['Ocupacion_rm']}</td>";
    echo "</tr>";
}

            ?>
            
                <!-- <tr>
                    <td> </td>
                    <td> </td>
                    <td> </td>
                    <td> </td>
                    <td> </td>
                    <td> </td>
                </tr>
                <tr>
                    <td> </td>
                    <td> </td>
                    <td> </td>
                    <td> </td>
                    <td> </td>
                    <td> </td>
                </tr>
                <tr>
                    <td> </td>
                    <td> </td>
                    <td> </td>
                    <td> </td>
                    <td> </td>
                    <td> </td>
                </tr> -->
            </table> 
        </div>
    </div>
</body>
</html>